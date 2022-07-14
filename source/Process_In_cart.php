<?php
Session_start();
$id = $_GET['id'];

require 'connectmysql.php';
if(empty($_SESSION['cart'][$id])){   
    $sql = "select * from products where Productid = '$id'";
    $result = mysqli_query($Access, $sql);
    $Get_one = mysqli_fetch_array($result);
    $_SESSION['cart'][$id]['name'] = $Get_one['Name'];
    $_SESSION['cart'][$id]['photo'] = $Get_one['photo'];
    $_SESSION['cart'][$id]['price'] = $Get_one['Price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
}
else{
    $_SESSION['cart'][$id]['quantity']++;
}

header('location:Cart.php');
mysqli_close($Access);

?>