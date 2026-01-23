<?php
session_start();

// Simple password protection
$admin_password = 'admin@123';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
    } else {
        $error = 'Invalid password';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: products.php');
    exit;
}

// Check if logged in
if (!isset($_SESSION['admin_logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login - United Apparel Group</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>

    <body class="bg-gradient-to-br from-gray-900 to-black min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
            <div class="p-8 pb-6">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Welcome Back</h1>
                    <p class="text-gray-500 mt-2 text-sm">Sign in to manage your products</p>
                </div>

                <?php if (isset($error)): ?>
                    <div
                        class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r flex items-center shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-medium"><?php echo $error; ?></span>
                    </div>
                <?php endif; ?>

                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                        <div class="relative group">
                            <input type="password" name="password" id="passwordInput"
                                class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-black focus:border-black transition-all duration-200 outline-none text-gray-800 placeholder-gray-400 group-hover:border-gray-400"
                                placeholder="Enter admin password" required>

                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors duration-200">
                                <!-- Eye Open Icon -->
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <!-- Eye Closed Icon (Hidden by default) -->
                                <svg id="eyeOffIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" name="login"
                        class="w-full bg-black text-white font-semibold py-3.5 rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-all duration-200 shadow-md hover:shadow-lg transform active:scale-[0.99]">
                        Sign In
                    </button>
                </form>
            </div>
            <div class="bg-gray-50 py-4 text-center border-t border-gray-100">
                <p class="text-xs text-gray-500">&copy; <?php echo date('Y'); ?> United Apparel Group</p>
            </div>
        </div>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('passwordInput');
                const eyeIcon = document.getElementById('eyeIcon');
                const eyeOffIcon = document.getElementById('eyeOffIcon');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.add('hidden');
                    eyeOffIcon.classList.remove('hidden');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('hidden');
                    eyeOffIcon.classList.add('hidden');
                }
            }
        </script>
    </body>

    </html>
    <?php
    exit;
}

// Read current products from data.js
$dataFile = '../assets/js/data.js';
$products = [];

if (file_exists($dataFile)) {
    $content = file_get_contents($dataFile);
    // Extract products from JavaScript
    preg_match('/const products = ({.*?});/s', $content, $matches);
    if (isset($matches[1])) {
        // This is a simplified parser - we'll improve it
        // For now, we'll work with the structure
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management - United Apparel Group</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-black text-white p-2 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold tracking-tight text-gray-900">United Apparel Admin</h1>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500 hidden sm:block">Logged in as Admin</span>
                    <a href="?logout"
                        class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </header>

        <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

            <div class="sm:flex sm:items-center sm:justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Products</h2>
                    <p class="mt-1 text-sm text-gray-500">Manage your store inventory, prices, and categories.</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <button onclick="showAddForm()"
                        class="inline-flex items-center justify-center rounded-lg bg-black px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black transition-all">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Product
                    </button>
                </div>
            </div>

            <!-- Stats Overview (Optional Polish) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                    <p class="text-xs font-medium text-gray-500 uppercase">Total Categories</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">5</p>
                </div>
                <!-- We could dynamically populate these later if needed -->
            </div>

            <!-- Products Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div id="productsList" class="min-w-full">
                    <div class="p-12 text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Loading products data...
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
            <div class="max-w-7xl mx-auto px-4 text-center text-sm text-gray-500">
                &copy; <?php echo date('Y'); ?> United Apparel Group. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Modal Form (Hidden by default) -->
    <div id="productForm" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="hideForm()"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold leading-6 text-gray-900" id="formTitle">Product Details</h3>
                        <button onclick="hideForm()"
                            class="text-gray-400 hover:text-gray-500 bg-gray-100 p-2 rounded-full transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form id="productFormElement" enctype="multipart/form-data">
                        <input type="hidden" id="productId" name="id">

                        <div class="grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2">
                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Product Name <span
                                        class="text-red-500">*</span></label>
                                <input type="text" id="productName" name="name"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border"
                                    placeholder="e.g. Premium Cotton Tee" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Category <span
                                        class="text-red-500">*</span></label>
                                <select id="productCategory" name="category"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border"
                                    required>
                                    <option value="">Select Category</option>
                                    <option value="Men's">Men's</option>
                                    <option value="Women's">Women's</option>
                                    <option value="Kids">Kids</option>
                                    <option value="Sports">Sports</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Price ($) <span
                                        class="text-red-500">*</span></label>
                                <input type="number" id="productPrice" name="price" step="0.01"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border"
                                    placeholder="0.00" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Old Price ($) <span
                                        class="text-gray-400 text-xs">(Optional)</span></label>
                                <input type="number" id="productOldPrice" name="oldPrice" step="0.01"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border"
                                    placeholder="0.00">
                            </div>

                            <div class="col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Image URL <span
                                        class="text-red-500">*</span></label>
                                <div class="flex gap-2">
                                    <input type="url" id="productImage" name="image"
                                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border"
                                        placeholder="https://..." required>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Paste a direct link to the product image.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Badge <span
                                        class="text-gray-400 text-xs">(Optional)</span></label>
                                <select id="productBadge" name="badge"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border">
                                    <option value="">None</option>
                                    <option value="Hot">Hot</option>
                                    <option value="New">New</option>
                                    <option value="Sale">Sale</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Badge Color <span
                                        class="text-gray-400 text-xs">(Optional)</span></label>
                                <select id="productBadgeColor" name="badgeColor"
                                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm py-2.5 px-3 border">
                                    <option value="">None</option>
                                    <option value="bg-red-500">Red</option>
                                    <option value="bg-blue-500">Blue</option>
                                    <option value="bg-green-500">Green</option>
                                    <option value="bg-black">Black</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end gap-3">
                            <button type="button" onclick="hideForm()"
                                class="rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all">Cancel</button>
                            <button type="submit"
                                class="rounded-lg bg-black px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 transition-all">Save
                                Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/data.js?v=<?php echo time(); ?>"></script>
    <script>
        // Display products from data.js
        function displayProducts() {
            const container = document.getElementById('productsList');

            if (typeof products === 'undefined') {
                container.innerHTML = `<div class="p-8 text-center"><div class="text-red-500 font-medium mb-2">Failed to load data.js</div><p class="text-sm text-gray-500">Please check if the file exists and is valid.</p></div>`;
                return;
            }

            let html = `
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Product</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
            `;

            let allProducts = [];
            try {
                Object.keys(products).forEach(category => {
                    allProducts = allProducts.concat(products[category]);
                });
            } catch (error) {
                container.innerHTML = '<p class="text-red-500 p-4">Error processing data.</p>';
                return;
            }

            // Unique Products
            const uniqueProducts = [];
            const seenIds = new Set();
            allProducts.forEach(product => {
                if (!seenIds.has(product.id)) {
                    uniqueProducts.push(product);
                    seenIds.add(product.id);
                }
            });

            if (uniqueProducts.length === 0) {
                html += `<tr><td colspan="5" class="px-6 py-12 text-center text-gray-500">
                    <p class="mb-2 font-medium">No products found</p>
                    <button onclick="showAddForm()" class="text-indigo-600 hover:underline text-sm">Add your first product</button>
                 </td></tr>`;
            }

            uniqueProducts.forEach(product => {
                const productJson = JSON.stringify(product).replace(/'/g, "&#39;");

                // Determine status badge (mock logic)
                let statusBadge = '<span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>';
                if (product.badge === 'Sale') statusBadge = '<span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Sale</span>';
                if (product.badge === 'Hot') statusBadge = '<span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Hot</span>';

                html += `
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-lg object-cover border border-gray-200" src="${product.image}" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="font-medium text-gray-900">${product.name}</div>
                                <div class="text-gray-500 text-xs">ID: ${product.id}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                            ${product.category}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 font-semibold">$${product.price}</div>
                        ${product.oldPrice ? `<div class="text-xs text-gray-400 line-through">$${product.oldPrice}</div>` : ''}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        ${statusBadge}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button onclick='editProduct(${productJson})' class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 p-2 rounded-lg transition-colors mr-2 text-xs font-semibold">
                            Edit
                        </button>
                        <button onclick="deleteProduct(${product.id})" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors text-xs font-semibold">
                            Delete
                        </button>
                    </td>
                </tr>`;
            });

            html += '</tbody></table></div>';
            container.innerHTML = html;
        }

        function showAddForm() {
            document.getElementById('productForm').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
            document.getElementById('formTitle').textContent = 'Add New Product';
            document.getElementById('productFormElement').reset();
        }

        function hideForm() {
            document.getElementById('productForm').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function editProduct(product) {
            showAddForm();
            document.getElementById('formTitle').textContent = 'Edit Product';
            document.getElementById('productId').value = product.id;
            document.getElementById('productName').value = product.name;
            document.getElementById('productCategory').value = product.category;
            document.getElementById('productPrice').value = product.price;
            document.getElementById('productOldPrice').value = product.oldPrice || '';
            document.getElementById('productImage').value = product.image;
            document.getElementById('productBadge').value = product.badge || '';
            document.getElementById('productBadgeColor').value = product.badgeColor || '';
        }

        function deleteProduct(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#000',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it',
                customClass: {
                    popup: 'rounded-xl',
                    confirmButton: 'rounded-lg px-4 py-2',
                    cancelButton: 'rounded-lg px-4 py-2'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('process-product.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ action: 'delete', id: id })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Product has been removed.',
                                    icon: 'success',
                                    confirmButtonColor: '#000',
                                    customClass: { popup: 'rounded-xl' }
                                }).then(() => location.reload());
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        });
                }
            });
        }

        document.getElementById('productFormElement').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const productData = {
                action: document.getElementById('productId').value ? 'edit' : 'add',
                id: parseInt(document.getElementById('productId').value) || Date.now(),
                name: formData.get('name'),
                category: formData.get('category'),
                price: parseFloat(formData.get('price')),
                oldPrice: formData.get('oldPrice') ? parseFloat(formData.get('oldPrice')) : null,
                image: formData.get('image'),
                badge: formData.get('badge') || null,
                badgeColor: formData.get('badgeColor') || null
            };

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Saving...';
            submitBtn.disabled = true;

            fetch('process-product.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(productData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Saved!',
                            text: 'Product has been successfully updated.',
                            icon: 'success',
                            confirmButtonColor: '#000',
                            customClass: { popup: 'rounded-xl' }
                        }).then(() => location.reload());
                    } else {
                        Swal.fire('Error', data.message, 'error');
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire('Error', 'Something went wrong', 'error');
                })
                .finally(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                });
        });

        setTimeout(displayProducts, 100);
    </script>
</body>

</html>