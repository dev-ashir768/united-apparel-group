<?php
header('Content-Type: application/json');
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Debug logging
function logDebug($msg)
{
    file_put_contents('debug_log.txt', date('[Y-m-d H:i:s] ') . print_r($msg, true) . "\n", FILE_APPEND);
}

function sendResponse($success, $message, $data = null)
{
    // logDebug("Sending response: " . json_encode(['success' => $success, 'message' => $message]));
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}

// Check if logged in
if (!isset($_SESSION['admin_logged_in'])) {
    sendResponse(false, 'Unauthorized access');
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
logDebug("Received Request: " . print_r($input, true));
if (!$input) {
    // If no input, perhaps it's a GET request to just fetch data?
    // But for this file we usually expect POST for actions.
    // We'll proceed but $action will be empty.
}

$action = $input['action'] ?? '';
$dataFile = '../assets/js/data.js';

// --- ROBUST FILE READING (PHP ONLY) ---
// We expect data.js to start with "const products = " and end with ";"
// The content inside is JS Object Notation. We must convert it to valid JSON for PHP.

if (!file_exists($dataFile)) {
    sendResponse(false, 'Data file not found');
}

$fileContent = file_get_contents($dataFile);
logDebug("File content length: " . strlen($fileContent));

// REMOVE BOM (Robustly)
$bom = "\xEF\xBB\xBF";
if (substr($fileContent, 0, 3) === $bom) {
    $fileContent = substr($fileContent, 3);
    logDebug("BOM removed");
} else {
    logDebug("No BOM found");
}

// Ensure valid UTF-8, stripping invalid sequences
$fileContent = iconv('UTF-8', 'UTF-8//IGNORE', $fileContent);
logDebug("UTF-8 cleaning done");

$startMarker = 'const products = ';

$startPos = strpos($fileContent, $startMarker);
if ($startPos === false) {
    logDebug("Start marker missing. Content start: " . substr($fileContent, 0, 50));
    sendResponse(false, 'Invalid data file format (start marker missing)');
}

// Remove the "const products = " prefix
$jsonContent = substr($fileContent, $startPos + strlen($startMarker));

// Remove the trailing semicolon and any whitespace including null bytes
$jsonContent = trim($jsonContent);
$jsonContent = trim($jsonContent, ";\x00..\x1F");
logDebug("Content prepared for parsing. Length: " . strlen($jsonContent));

// Helper function to convert JS Object Notation to valid JSON
function loose_json_decode($json_str)
{
    logDebug("Starting loose parser (Single-Pass Tokenizer)...");

    // 0. Cleanup control characters (Global)
    $json_str = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $json_str);

    // Single-Pass Tokenizer Regex
    // Matches in priority order:
    // 1. Block Comment: /* ... */
    // 2. Line Comment: // ... (to end of line)
    // 3. Double Quoted String: "..."
    // 4. Single Quoted String: '...'
    // 5. Unquoted Key: word:

    $regex = '~
        ( /\*[\s\S]*?\*/ ) |             # 1. Block Comment
        ( //.* ) |                       # 2. Line Comment
        ( "(?:[^"\\\\]|\\\\.)*" ) |      # 3. Double Quoted String
        ( \'(?:[^\'\\\\]|\\\\.)*\' ) |   # 4. Single Quoted String
        ( \b[a-zA-Z_]\w*\s*: )           # 5. Unquoted Key
    ~xu'; // x for comments in regex, u for unicode

    $json_str = preg_replace_callback($regex, function ($matches) {
        // Group 1 or 2: Comment -> Remove
        if (!empty($matches[1]) || !empty($matches[2])) {
            return '';
        }

        // Group 3: Double Quoted String -> Preserve but escape control chars
        if (!empty($matches[3])) {
            $str = $matches[3];
            // Escape literal control characters inside the string
            // We strip leading/trailing quotes to process content, then re-add
            $content = substr($str, 1, -1);
            $content = str_replace(["\n", "\r", "\t"], ["\\n", "\\r", "\\t"], $content);
            return '"' . $content . '"';
        }

        // Group 4: Single Quoted String -> Convert to Double
        if (!empty($matches[4])) {
            $str = $matches[4];
            $content = substr($str, 1, -1);
            $content = str_replace('"', '\"', $content); // Escape double
            $content = str_replace("\\'", "'", $content); // Unescape single
            $content = str_replace(["\n", "\r", "\t"], ["\\n", "\\r", "\\t"], $content);
            return '"' . $content . '"';
        }

        // Group 5: Key -> Quote it
        if (!empty($matches[5])) {
            // $matches[5] is like "name: " or "bestSellers:"
            // We want "name": 
            $parts = explode(':', $matches[5]);
            $key = trim($parts[0]);
            return '"' . $key . '":';
        }

        return $matches[0]; // Should not happen
    }, $json_str);

    // 6. Fix Trailing Commas (Separate pass, safer now that comments/keys are clean)
    // We assume JSON structure is now cleaner.
    $json_str = preg_replace('/,\s*([\]}])/', '$1', $json_str);

    logDebug("Tokenizer finished");
    return $json_str;
}

// Pre-process the content
// OPTIMIZATION: Try to decode strictly first, in case the file is already clean (which it should be now)
logDebug("Attempting strict decode...");
$products = json_decode($jsonContent, true);

if (!$products) {
    logDebug("Strict decode failed: " . json_last_error_msg() . ". Trying loose parser.");
    // If strict decode fails, try the loose parser
    $cleanJson = loose_json_decode($jsonContent);
    $products = json_decode($cleanJson, true);
    if (!$products) {
        logDebug("Loose parser failed: " . json_last_error_msg());
        // logDebug("Clean string sample: " . substr($cleanJson, 0, 500));
    }
} else {
    logDebug("Strict decode success!");
}

if (!$products) {
    $snippet = substr($jsonContent, 0, 500);
    $hex = bin2hex(substr($jsonContent, 0, 20)); // Check first 20 bytes for garbage
    sendResponse(false, 'JSON Parse Error: ' . json_last_error_msg() . " | Hex Start: $hex | Content: $snippet");
}

// Flatten products to a single list to easier manipulation
// We need to be careful: products can be in multiple categories (e.g. bestSellers + men)
// We need to manage them by ID.

$allProductsMap = [];

// Helper to add product to map
function mapProducts($list, &$map)
{
    if (!is_array($list))
        return;
    foreach ($list as $p) {
        if (isset($p['id'])) {
            $map[$p['id']] = $p;
        }
    }
}

// Map all existing products
foreach ($products as $key => $list) {
    mapProducts($list, $allProductsMap);
}

// --- HANDLE ACTIONS ---

if ($action === 'delete') {
    $idToDelete = $input['id'] ?? null;
    if (!$idToDelete)
        sendResponse(false, 'No ID provided for deletion');

    // Check existence
    if (!isset($allProductsMap[$idToDelete])) {
        sendResponse(false, 'Product not found');
    }

    // Remove from map
    unset($allProductsMap[$idToDelete]);
    $message = 'Product deleted successfully';
} elseif ($action === 'edit') {
    $idToEdit = $input['id'] ?? null;
    if (!$idToEdit)
        sendResponse(false, 'No ID provided for editing');

    if (!isset($allProductsMap[$idToEdit])) {
        sendResponse(false, 'Product not found');
    }

    // Update product data
    // We recreate the product to ensure schema consistency
    $updatedProduct = [
        'id' => (int) $idToEdit,
        'name' => $input['name'],
        'price' => (float) $input['price'],
        'oldPrice' => !empty($input['oldPrice']) ? (float) $input['oldPrice'] : null,
        'image' => $input['image'],
        'category' => $input['category'],
        'badge' => !empty($input['badge']) ? $input['badge'] : null,
        'badgeColor' => !empty($input['badge']) ? ($input['badgeColor'] ?? null) : null // Keep badge color logic consistent
    ];

    $allProductsMap[$idToEdit] = $updatedProduct;
    $message = 'Product updated successfully';
} elseif ($action === 'add') {
    $newId = $input['id'] ?? time(); // Fallback to timestamp if no ID
    // Ensure unique ID
    while (isset($allProductsMap[$newId])) {
        $newId++;
    }

    $newProduct = [
        'id' => (int) $newId,
        'name' => $input['name'],
        'price' => (float) $input['price'],
        'oldPrice' => !empty($input['oldPrice']) ? (float) $input['oldPrice'] : null,
        'image' => $input['image'],
        'category' => $input['category'],
        'badge' => !empty($input['badge']) ? $input['badge'] : null,
        'badgeColor' => !empty($input['badge']) ? ($input['badgeColor'] ?? null) : null
    ];

    $allProductsMap[$newId] = $newProduct;
    $message = 'Product added successfully';
} else {
    // Just a read or invalid action
    if ($action)
        sendResponse(false, 'Invalid action');
}

// --- RECONSTRUCT DATA STRUCTURE ---
// We need to distribute products back into categories and bestSellers.
// Rebuild the structure from scratch to ensure cleanliness.

$newStructure = [
    'bestSellers' => [],
    'men' => [],
    'women' => [],
    'kids' => [],
    'sports' => []
];

foreach ($allProductsMap as $p) {
    $categoryKey = strtolower($p['category']);

    // Normalize category key
    if ($p['category'] === "Men's")
        $categoryKey = 'men';
    if ($p['category'] === "Women's")
        $categoryKey = 'women';
    if ($p['category'] === "Kids")
        $categoryKey = 'kids';
    if ($p['category'] === "Sports")
        $categoryKey = 'sports';

    // Add to specific category if it exists
    if (isset($newStructure[$categoryKey])) {
        $newStructure[$categoryKey][] = $p;
    }

    // Logic for Best Sellers
    // For now, let's say the first 8 products we find go to best sellers?
    // OR we just keep the ones that were there. 
    // BUT the user edit might change categories.
    // SIMPLIFICATION: Add first 8 products to bestSellers regardless of category, or keep it consistent.
    // Let's just fill bestSellers with the first 4 items for now as per sample content
    if (count($newStructure['bestSellers']) < 4) {
        $newStructure['bestSellers'][] = $p;
    }
}

// --- WRITE TO FILE ---
// --- WRITE TO FILE ---
// Use strict JSON encoding without pretty print if pretty print causes issues in some PHP versions,
// but PRETTY_PRINT is usually fine.
// Vital: JSON_UNESCAPED_UNICODE ensures "Men's" doesn't become "Men\u0027s" which might be weird to read, 
// though valid JSON. 
// We use JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
$newJson = json_encode($newStructure, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

if ($newJson === false) {
    sendResponse(false, 'JSON Encode Error: ' . json_last_error_msg());
}

$newFileContent = "const products = " . $newJson . ";";

// Create backup
$backupFile = $dataFile . '.backup.' . date('Y-m-d-H-i-s');
copy($dataFile, $backupFile);

if (file_put_contents($dataFile, $newFileContent) === false) {
    sendResponse(false, 'Failed to write updated data');
}

sendResponse(true, $message ?? 'Operation successful');
?>