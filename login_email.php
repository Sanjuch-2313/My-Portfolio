<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    if ($email === 'sanjuchoppara@gmail.com') {
        $_SESSION['otp_email'] = $email;
        header("Location: send_otp.php");
        exit;
    } else {
        $error = 'Unauthorized email address.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Verification</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="login-box">
    <h2>Enter Your Email</h2>
    <?php if ($error): ?>
      <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post">
      <input type="email" name="email" placeholder="Email address" required><br>
      <input type="submit" value="Send OTP">
    </form>
  </div>
</body>
</html>