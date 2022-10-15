<?php
    include_once "connection.php";
    session_start();
    $userId = $_SESSION['id'];
    $itemid = $_GET['id'];

    $result = "DELETE FROM users_items where user_id='$userId' and item_id='$itemid'";

    mysqli_query($conn , $result);
    header('location:cart.php');

?>