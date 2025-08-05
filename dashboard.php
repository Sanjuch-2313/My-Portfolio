<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="dashboard">
    <h2>Welcome, Admin 👋</h2>
    <p>You're logged in. What would you like to do?</p>

    <div class="admin-actions">
      <a href="update_project.php" class="btn">➕ Add /Update Ideas</a>
      <a href="../index.php" class="btn">🏠 View Portfolio</a>
      <a href="logout.php" class="btn logout">🚪 Logout</a>
    </div>
  </div>
</body>
</html>
