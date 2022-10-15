<?php
require 'connection.php';
session_start();

include_once("config.php");

// include_once("user.php");
// $usertype = $_GET['usertype'];


// echo $usertype;
    $id = $_GET['id'];
    
    $user = $_SESSION['level'];
    $result_level = mysqli_query($mysqli,"select * from users WHERE id = $id");
    $row_level=mysqli_fetch_array($result_level);

    if ($user<$row_level['level']) {
        $result = mysqli_query($mysqli,"UPDATE users SET level = 0 WHERE id = $id");
    }
    // else {
    //     echo "bad";
    // }


    if ($row_level['usertype']=="user") {
        header("Location: user.php?usertype=user");
    }
    else{
        header("Location: user.php?usertype=admin");
    }
   
  
    
    // header("Location: blockuser.php");
?>