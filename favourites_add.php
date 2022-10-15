<?php
include_once "connection.php";
session_start();

$itemid = $_GET['id'];
$userid = $_SESSION['id'];

$addquery= "INSERT INTO fav_items(user_id,item_id,list_name,status_cart,status_fav) values ('$userid', '$itemid', 'general_list', '', 'Added to favourites')";

mysqli_query($conn, $addquery);
header('location:products.php');

?>