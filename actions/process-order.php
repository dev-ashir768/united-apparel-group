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
    // Get order data from POST
    $orderData = json_decode(file_get_contents('php://input'), true);

    if (!$orderData) {
        echo json_encode(['success' => false, 'message' => 'Invalid order data']);
        exit;
    }

    $name = filter_var($orderData['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($orderData['email'], FILTER_SANITIZE_EMAIL);
    $address = filter_var($orderData['address'], FILTER_SANITIZE_STRING);
    $country = filter_var($orderData['country'], FILTER_SANITIZE_STRING);
    $phone = filter_var($orderData['phone'], FILTER_SANITIZE_STRING);
    $city = filter_var($orderData['city'], FILTER_SANITIZE_STRING);
    $zip = filter_var($orderData['zip'], FILTER_SANITIZE_STRING);
    $items = $orderData['items'];
    $subtotal = floatval($orderData['subtotal']);
    $tax = floatval($orderData['tax']);
    $shipping = floatval($orderData['shipping']);
    $total = floatval($orderData['total']);
    $orderId = 'ORD-' . strtoupper(substr(md5(time() . $email), 0, 8));

    // Build items table for email
    $itemsHtml = '';
    foreach ($items as $item) {
        $itemName = isset($item['name']) ? htmlspecialchars($item['name']) : 'Product';
        $itemPrice = isset($item['price']) ? floatval($item['price']) : 0;
        $itemQty = isset($item['quantity']) ? intval($item['quantity']) : 0;
        $itemTotal = $itemPrice * $itemQty;

        $itemsHtml .= "
        <tr>
            <td style='padding: 10px; border-bottom: 1px solid #eee;'>{$itemName}</td>
            <td style='padding: 10px; border-bottom: 1px solid #eee; text-align: center;'>{$itemQty}</td>
            <td style='padding: 10px; border-bottom: 1px solid #eee; text-align: right;'>\$" . number_format($itemPrice, 2) . "</td>
            <td style='padding: 10px; border-bottom: 1px solid #eee; text-align: right; font-weight: bold;'>\$" . number_format($itemTotal, 2) . "</td>
        </tr>";
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
        $customerMail->Subject = "Order Confirmation #{$orderId} - United Apparel Group";

        $customerMail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #000; color: #fff; padding: 20px; text-align: center; }
                .content { background: #f9f9f9; padding: 30px; }
                .order-box { background: #fff; padding: 20px; margin: 20px 0; border-left: 4px solid #4F46E5; }
                table { width: 100%; border-collapse: collapse; margin: 15px 0; }
                .total-row { background: #f3f4f6; font-weight: bold; }
                .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>Order Confirmed!</h1>
                    <p>Order #{$orderId}</p>
                </div>
                <div class='content'>
                    <p>Dear $name,</p>
                    <p>Thank you for your order! We're preparing your items for shipment.</p>
                    
                    <div class='order-box'>
                        <h3>Order Details:</h3>
                        <table>
                            <thead>
                                <tr style='background: #f9fafb;'>
                                    <th style='padding: 10px; text-align: left;'>Item</th>
                                    <th style='padding: 10px; text-align: center;'>Qty</th>
                                    <th style='padding: 10px; text-align: right;'>Price</th>
                                    <th style='padding: 10px; text-align: right;'>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                $itemsHtml
                            </tbody>
                            <tfoot>
                                <tr><td colspan='3' style='padding: 10px; text-align: right;'>Subtotal:</td><td style='padding: 10px; text-align: right;'>\$" . number_format($subtotal, 2) . "</td></tr>
                                <tr><td colspan='3' style='padding: 10px; text-align: right;'>Tax:</td><td style='padding: 10px; text-align: right;'>\$" . number_format($tax, 2) . "</td></tr>
                                <tr><td colspan='3' style='padding: 10px; text-align: right;'>Shipping:</td><td style='padding: 10px; text-align: right;'>" . ($shipping == 0 ? 'Free' : '$' . number_format($shipping, 2)) . "</td></tr>
                                <tr class='total-row'><td colspan='3' style='padding: 10px; text-align: right;'>Total:</td><td style='padding: 10px; text-align: right;'>\$" . number_format($total, 2) . "</td></tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <div class='order-box'>
                        <h3>Shipping Address:</h3>
                        <p>$name<br>$address<br>$city, $zip<br>$country<br>Phone: $phone</p>
                    </div>
                    
                    <p><strong>Payment Method:</strong> Cash on Delivery (COD)</p>
                    <p>We will contact you within 24 hours to confirm your order.</p>
                    <p>Best regards,<br>United Apparel Group Team</p>
                </div>
                <div class='footer'>
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
        $adminMail->Subject = "New Order #{$orderId} - $name";

        $adminMail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #000; color: #fff; padding: 20px; }
                .content { background: #f9f9f9; padding: 30px; }
                .order-box { background: #fff; padding: 20px; margin: 20px 0; border-left: 4px solid #4F46E5; }
                table { width: 100%; border-collapse: collapse; margin: 15px 0; }
                .urgent { background: #FEE2E2; color: #991B1B; padding: 10px; border-radius: 5px; margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🛒 New Order Received</h2>
                    <p>Order #{$orderId}</p>
                </div>
                <div class='content'>
                    <div class='urgent'>
                        <strong>⚡ Action Required:</strong> Process and confirm order within 24 hours
                    </div>
                    
                    <div class='order-box'>
                        <h3>Customer Information:</h3>
                        <p><strong>Name:</strong> $name<br>
                        <strong>Email:</strong> <a href='mailto:$email'>$email</a><br>
                        <strong>Phone:</strong> <a href='tel:$phone'>$phone</a></p>
                    </div>
                    
                    <div class='order-box'>
                        <h3>Shipping Address:</h3>
                        <p>$address<br>$city, $zip<br>$country</p>
                    </div>
                    
                    <div class='order-box'>
                        <h3>Order Items:</h3>
                        <table>
                            <thead>
                                <tr style='background: #f9fafb;'>
                                    <th style='padding: 10px; text-align: left;'>Item</th>
                                    <th style='padding: 10px; text-align: center;'>Qty</th>
                                    <th style='padding: 10px; text-align: right;'>Price</th>
                                    <th style='padding: 10px; text-align: right;'>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                $itemsHtml
                            </tbody>
                        </table>
                        <p><strong>Subtotal:</strong> \$" . number_format($subtotal, 2) . "<br>
                        <strong>Tax:</strong> \$" . number_format($tax, 2) . "<br>
                        <strong>Shipping:</strong> " . ($shipping == 0 ? 'Free' : '$' . number_format($shipping, 2)) . "<br>
                        <strong>Total:</strong> \$" . number_format($total, 2) . "</p>
                    </div>
                    
                    <p><strong>Payment Method:</strong> Cash on Delivery (COD)</p>
                    <p><strong>Order Date:</strong> " . date('F j, Y, g:i a') . "</p>
                </div>
            </div>
        </body>
        </html>
        ";

        $adminMail->send();

        echo json_encode([
            'success' => true,
            'message' => 'Order placed successfully!',
            'orderId' => $orderId
        ]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Failed to send confirmation emails: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>