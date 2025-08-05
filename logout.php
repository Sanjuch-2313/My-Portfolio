<?php
session_start();
session_unset();
session_destroy();
echo "You are logged out successfully. <a href='dashboard.php'>Go to login</a>";
?>
