<?php
Session_start();

$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
header("Location:Cart.php");

?>