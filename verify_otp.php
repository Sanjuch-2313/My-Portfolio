<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered = $_POST['otp'];
    if (isset($_SESSION['generated_otp']) && $entered == $_SESSION['generated_otp']) {
        $_SESSION['otp_verified'] = true;
        unset($_SESSION['generated_otp']);
        header("Location: update_project.php");
        exit;
    } else {
        $error = 'Incorrect OTP';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Verify OTP</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="login-box">
    <h2>Verify OTP</h2>
    <?php if ($error): ?>
      <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="post">
      <input type="text" name="otp" placeholder="Enter 6-digit OTP" required><br>
      <input type="submit" value="Verify">
    </form>
  </div>
</body>
</html>
