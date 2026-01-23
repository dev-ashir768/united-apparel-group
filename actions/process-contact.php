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
    $subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    // Validation
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }

    if (empty($subject)) {
        $errors[] = "Subject is required";
    }

    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If no errors, send emails
    if (empty($errors)) {
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
            $customerMail->Subject = "We Received Your Message - United Apparel Group";

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
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h1>United Apparel Group</h1>
                    </div>
                    <div class='content'>
                        <h2>Thank You for Contacting Us!</h2>
                        <p>Dear $name,</p>
                        <p>We have received your message and will respond within 24 hours.</p>
                        
                        <div class='details'>
                            <h3>Your Message:</h3>
                            <p><strong>Subject:</strong> $subject</p>
                            <p><strong>Message:</strong><br>$message</p>
                        </div>
                        
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
            $adminMail->Subject = "New Contact Form Message - $name";

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
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>📧 New Contact Form Message</h2>
                    </div>
                    <div class='content'>
                        <div class='details'>
                            <h3>Contact Information:</h3>
                            <table>
                                <tr><td class='label'>Name:</td><td>$name</td></tr>
                                <tr><td class='label'>Email:</td><td><a href='mailto:$email'>$email</a></td></tr>
                                <tr><td class='label'>Subject:</td><td>$subject</td></tr>
                            </table>
                        </div>
                        
                        <div class='details'>
                            <h3>Message:</h3>
                            <p>$message</p>
                        </div>
                        
                        <p><strong>Submitted:</strong> " . date('F j, Y, g:i a') . "</p>
                    </div>
                </div>
            </body>
            </html>
            ";

            $adminMail->send();

            echo json_encode(['success' => true, 'message' => 'Message sent successfully!']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to send email: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>