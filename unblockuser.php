<?php
require 'connection.php';
session_start();

include_once("config.php");



    $id = $_GET['id'];
    
    $user = $_SESSION['level'];
    $result= mysqli_query($mysqli,"select * from users WHERE id = $id");
    $row=mysqli_fetch_array($result);
    
    if ($row['usertype']=="user") {
        $result = mysqli_query($mysqli,"UPDATE users SET level = 3 WHERE id = $id");
        header("Location: user.php?usertype=user");
    }
    else
    if ($user ==1) {
        $result = mysqli_query($mysqli,"UPDATE users SET level = 2 WHERE id = $id");
        header("Location: user.php?usertype=admin");
    }


   
    
    
    // header("Location: unblockuser.php");
?>