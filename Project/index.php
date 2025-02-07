<?php

session_start();
require_once "includes/header.php"; 

echo "<h2>Welcome to the Shop Management System</h2>";

if (isset($_SESSION['username'])) {
    echo "<p>Hello, " . $_SESSION['username'] . "!</p>";
    echo "<a href='pages/dashboard.php'>Go to Dashboard</a> | <a href='logout.php'>Logout</a>";
} else {
    echo "<a href='pages/login.php'>Login</a> | <a href='pages/register.php'>Register</a>";
}

require_once "includes/footer.php"; 
?>
