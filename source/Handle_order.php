<?php
session_start();
if(empty($_POST['orderAddress']) || empty($_POST['orderPhone'])){
    $_SESSION['notLogin'] = "ok";
    header('Location:Cart.php');
    exit();
}
$Address = $_POST['orderAddress'];
$Phone = $_POST['orderPhone'];

require_once "connectmysql.php";

$cartOrder = $_SESSION['cart'];
$allcost = 0;
foreach ($cartOrder as $incart){
    $allcost += $incart['price'] * $incart['quantity'];
}
$id = $_SESSION['id'];
$sql = "insert into orders(Cusid,Total,Address)
 values ('$id','$allcost','$Address')";
mysqli_query($Access,$sql);


$sql1 = "select OrderId from orders where Cusid = '$id' order by OrderId desc limit 1";
$result = mysqli_query($Access,$sql1);
$ToID = mysqli_fetch_array($result)['OrderId'];


foreach($cartOrder as $id => $Order){

    $Quantity = $Order['quantity'];
    $sql2 = "insert into orderdetail(Orderid,Productid,Quantitty) values ('$ToID','$id','$Quantity')";
    mysqli_query($Access,$sql2);


}
header("location:index.php");

unset($_SESSION['Cart']);
mysqli_close($Access);


?>
