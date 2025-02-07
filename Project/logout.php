<?php
session_start();
require_once "classes/User.php";

$database = new Database();
$user = new User($database);

$user->logout();
?>