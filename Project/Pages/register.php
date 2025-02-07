<?php
require_once "../classes/Database.php";
require_once "../classes/User.php";

$database = new Database();
$user = new User($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->register($username, $password)) {
        echo "Registration successful. <a href='login.php'>Login here</a>.";
    } else {
        echo "Registration failed.";
    }
}
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
<a href="login.php">Login</a>