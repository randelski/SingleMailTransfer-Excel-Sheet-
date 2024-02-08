<?php

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Check if form fields are present
if (isset($_POST['receiver'], $_POST['subject'], $_POST['body'])) {
    // Initialize PHPMailer
    $mail = new PHPMailer;

    // Set PHPMailer to use SMTP
    $mail->isSMTP();

    // SMTP configuration
    $mail->Host = 'mail.automation.bnshosting.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'ojt1@automation.bnshosting.net';
    $mail->Password = '461m5t$aF';
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Set email parameters
    $mail->setFrom('ojt1@automation.bnshosting.net', 'Here is your name');
    $mail->addAddress($_POST["receiver"]); // Add recipient email address

    // Set email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $_POST["subject"]; // Set email subject
    $mail->Body = $_POST["body"]; // Set email body

    // Send email
    if ($mail->send()) {
        echo 'Email sent successfully!';
    } else {
        echo 'Error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Error: Form fields are missing.';
}
?>