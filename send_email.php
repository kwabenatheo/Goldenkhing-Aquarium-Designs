<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kwabenatheo937@gmail.com'; // Your Gmail address
        $mail->Password = 'theo@021104'; // Replace with your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('kwabenatheo937@gmail.com', 'AquaDreams'); // Your Gmail address
        $mail->addReplyTo($email, $name); // Add user's email as reply-to
        $mail->addAddress('kwabenatheo937@gmail.com'); // Your Gmail address
        $mail->Subject = "New Contact Form Submission from $name";
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

        $mail->send();
        echo "success"; // Output success message
    } catch (Exception $e) {
        echo "error: " . $mail->ErrorInfo; // Output detailed error message
    }
}
?>