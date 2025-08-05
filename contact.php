<?php 
include 'includes/header.php'; 
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>

<section class="contact-section">
  <h2>Contact Me</h2>
  <form method="post" class="contact-form">
    <label for="name">Name:</label><br>
    <input type="text" name="name" required><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" required><br>

    <label for="message">Message:</label><br>
    <textarea name="message" rows="5" required></textarea><br>

    <input type="submit" name="submit" value="Send Message">
  </form>

<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $fromEmail = htmlspecialchars($_POST['email']);
    $userMessage = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sanjuchoppara@gmail.com';         // your Gmail
        $mail->Password   = 'mvgkcqjdgioixvpq';      // App password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($fromEmail, $name);
        $mail->addAddress('sanjuchoppara@gmail.com');          // send to yourself

        $mail->Subject = "New Message from Portfolio";
        $mail->Body    = "Name: $name\nEmail: $fromEmail\nMessage:\n$userMessage";

        $mail->send();
        echo "<p style='color: green;'>Message sent successfully. I’ll get back to you soon!</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>Message failed. Error: {$mail->ErrorInfo}</p>";
    }
}
?>
</section>

<?php include 'includes/footer.php'; ?>
