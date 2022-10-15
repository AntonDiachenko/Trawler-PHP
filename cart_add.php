<?php
include_once "connection.php";
session_start();

$itemid = $_GET['id'];
$userid = $_SESSION['id'];

$addquery= "INSERT INTO users_items(user_id,item_id,status_cart) values ('$userid', '$itemid','Added to cart')";

mysqli_query($conn, $addquery);
header('location:products.php');

?>