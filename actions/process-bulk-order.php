<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Email configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = 'toolgram3@gmail.com';
$smtp_password = 'gtbuwahoeyairuvd';
$smtp_from_email = 'toolgram3@gmail.com';
$smtp_from_name = 'United Apparel Group';
$admin_email = 'techashir167@gmail.com';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
    $company = filter_var(trim($_POST['company']), FILTER_SANITIZE_STRING);
    $category = filter_var(trim($_POST['category']), FILTER_SANITIZE_STRING);
    $quantity = filter_var(trim($_POST['quantity']), FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    // Validation
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }

    if (empty($category)) {
        $errors[] = "Category is required";
    }

    if (empty($quantity) || $quantity < 50) {
        $errors[] = "Minimum quantity is 50 units";
    }

    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If no errors, send emails
    if (empty($errors)) {
        // Calculate discount based on quantity
        $discount = 0;
        if ($quantity >= 500) {
            $discount = 40;
        } elseif ($quantity >= 250) {
            $discount = 30;
        } elseif ($quantity >= 100) {
            $discount = 20;
        } elseif ($quantity >= 50) {
            $discount = 10;
        }

        try {
            // Email to Customer
            $customerMail = new PHPMailer(true);
            $customerMail->isSMTP();
            $customerMail->Host = $smtp_host;
            $customerMail->SMTPAuth = true;
            $customerMail->Username = $smtp_username;
            $customerMail->Password = $smtp_password;
            $customerMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $customerMail->Port = $smtp_port;
            $customerMail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $customerMail->setFrom($smtp_from_email, $smtp_from_name);
            $customerMail->addAddress($email, $name);
            $customerMail->isHTML(true);
            $customerMail->Subject = "Bulk Order Quote Request Received - United Apparel Group";

            $customerMail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: #000; color: #fff; padding: 20px; text-align: center; }
                    .content { background: #f9f9f9; padding: 30px; }
                    .details { background: #fff; padding: 20px; margin: 20px 0; border-left: 4px solid #000; }
                    .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
                    .highlight { color: #4F46E5; font-weight: bold; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>United Apparel Group</h1>
                    </div>
                    <div class='content'>
                        <h2>Thank You for Your Interest!</h2>
                        <p>Dear $name,</p>
                        <p>We have received your bulk order quote request. Our team will review your requirements and get back to you within 24 hours.</p>
                        
                        <div class='details'>
                            <h3>Your Request Details:</h3>
                            <p><strong>Category:</strong> $category</p>
                            <p><strong>Quantity:</strong> $quantity units</p>
                            <p><strong>Estimated Discount:</strong> <span class='highlight'>{$discount}% OFF</span></p>
                            <p><strong>Company:</strong> " . ($company ?: 'N/A') . "</p>
                            <p><strong>Message:</strong> $message</p>
                        </div>
                        
                        <p>We look forward to serving your bulk order needs!</p>
                        <p>Best regards,<br>United Apparel Group Team</p>
                    </div>
                    <div class='footer'>
                        <p>This is an automated message. Please do not reply to this email.</p>
                        <p>&copy; " . date('Y') . " United Apparel Group. All rights reserved.</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            $customerMail->send();

            // Email to Admin
            $adminMail = new PHPMailer(true);
            $adminMail->isSMTP();
            $adminMail->Host = $smtp_host;
            $adminMail->SMTPAuth = true;
            $adminMail->Username = $smtp_username;
            $adminMail->Password = $smtp_password;
            $adminMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $adminMail->Port = $smtp_port;
            $adminMail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $adminMail->setFrom($smtp_from_email, $smtp_from_name);
            $adminMail->addAddress($admin_email);
            $adminMail->addReplyTo($email, $name);
            $adminMail->isHTML(true);
            $adminMail->Subject = "New Bulk Order Quote Request - $name";

            $adminMail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                    .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                    .header { background: #000; color: #fff; padding: 20px; }
                    .content { background: #f9f9f9; padding: 30px; }
                    .details { background: #fff; padding: 20px; margin: 20px 0; border-left: 4px solid #4F46E5; }
                    table { width: 100%; border-collapse: collapse; }
                    td { padding: 10px; border-bottom: 1px solid #eee; }
                    .label { font-weight: bold; width: 150px; }
                    .urgent { background: #FEE2E2; color: #991B1B; padding: 10px; border-radius: 5px; margin: 10px 0; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>🔔 New Bulk Order Quote Request</h2>
                    </div>
                    <div class='content'>
                        <div class='urgent'>
                            <strong>⚡ Action Required:</strong> Customer expecting response within 24 hours
                        </div>
                        
                        <div class='details'>
                            <h3>Customer Information:</h3>
                            <table>
                                <tr><td class='label'>Name:</td><td>$name</td></tr>
                                <tr><td class='label'>Email:</td><td><a href='mailto:$email'>$email</a></td></tr>
                                <tr><td class='label'>Phone:</td><td><a href='tel:$phone'>$phone</a></td></tr>
                                <tr><td class='label'>Company:</td><td>" . ($company ?: 'N/A') . "</td></tr>
                            </table>
                        </div>
                        
                        <div class='details'>
                            <h3>Order Details:</h3>
                            <table>
                                <tr><td class='label'>Category:</td><td>$category</td></tr>
                                <tr><td class='label'>Quantity:</td><td><strong>$quantity units</strong></td></tr>
                                <tr><td class='label'>Discount Tier:</td><td><strong>{$discount}% OFF</strong></td></tr>
                            </table>
                        </div>
                        
                        <div class='details'>
                            <h3>Additional Message:</h3>
                            <p>$message</p>
                        </div>
                        
                        <p><strong>Submitted:</strong> " . date('F j, Y, g:i a') . "</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            $adminMail->send();

            echo json_encode(['success' => true, 'message' => 'Quote request submitted successfully!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to send emails: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>