<?php
session_start();
if (!isset($_SESSION['otp_email']) || $_SESSION['otp_email'] !== 'sanjuchoppara@gmail.com') {
    header("Location: login_email.php");
    exit;
}

// PHPMailer Manual Includes (since you're not using Composer)
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Generate OTP
$otp = rand(100000, 999999);
$_SESSION['generated_otp'] = $otp;

// Setup PHPMailer
$mail = new PHPMailer(true);

try {
    // (Optional) Debugging — helps see what's wrong if any issue
    // $mail->SMTPDebug = 2;
    // $mail->Debugoutput = 'html';

    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sanjuchoppara@gmail.com';         // your Gmail
    $mail->Password = 'mvgkcqjdgioixvpq';      // replace with real app password
    $mail->SMTPSecure = 'tls';                           // or 'ssl' if using port 465
    $mail->Port = 587;

    // Email content
    $mail->setFrom('sanjuchoppara@gmail.com', 'Sanju Portfolio OTP');
    $mail->addAddress($_SESSION['otp_email']); // to yourself

    $mail->isHTML(true);
    $mail->Subject = 'Your OTP for Project Access';
    $mail->Body    = "<p>Hello Sanju 👋,<br>Your OTP is: <strong>$otp</strong></p>";
    $mail->AltBody = "Hello Sanju, your OTP is: $otp";

    // Send Email
    $mail->send();

    // Redirect to OTP verification
    header("Location: verify_otp.php");
    exit;

} catch (Exception $e) {
    echo "<h3 style='color:red;'>OTP could not be sent. Mailer Error:</h3>";
    echo "<p>{$mail->ErrorInfo}</p>";
}
?>
