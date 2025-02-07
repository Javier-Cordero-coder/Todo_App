<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once "../classes/Database.php";
require_once "../classes/Product.php";

$database = new Database();
$product = new Product($database);

$products = $product->read();
?>

<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
<a href="products.php">Manage Products</a>
<a href="logout.php">Logout</a>