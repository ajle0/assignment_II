<?php
session_start();
require 'config.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$correct_email = "user@example.com";
$correct_password = "password123";

// Check credentials
if ($_POST['email'] === $correct_email && $_POST['password'] === $correct_password) {
    // Generate 6-digit 2FA code
    $two_fa_code = rand(100000, 999999);
    $_SESSION['two_fa_code'] = $two_fa_code;
    $_SESSION['email'] = $_POST['email'];

    // Send 2FA code via email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = EMAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_USER;
        $mail->Password = EMAIL_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port = EMAIL_PORT;

        $mail->setFrom('no-reply@example.com', '2FA Demo');
        $mail->addAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Subject = 'Your 2FA Code';
        $mail->Body = "<p>Your 2FA code is <b>$two_fa_code</b></p>";

        $mail->send();
        header('Location: verify.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid login credentials";
}
?>

