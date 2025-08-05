<?php
session_start();
if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: login_email.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sanju's Ideas</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="dashboard">
    <h2>Sanju's Ideas</h2>
    <p>welcome to my world.These are my some of secrets here.Like this is my diary,This will be seen when i Die.</p>
    <!-- Add your form here to upload projects to DB -->
    <a href="logout.php" class="btn logout">Logout</a>
  </div>
</body>
</html>
