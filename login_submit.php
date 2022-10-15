<?php
include_once "connection.php";
session_start();

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
$reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

$user_query = "SELECT * FROM users WHERE email='$email' and password='$password'";
$result = mysqli_query($conn , $user_query);
$row=mysqli_fetch_array($result);


    if(!preg_match($reg_email , $email)){
        echo "Incorrect email";
    }
    if(strlen($password)<6){
        echo "password should be bigger than 6 char";
    }

    if(mysqli_num_rows($result)==0){
        echo "wrong email or pass";
        header('Location: login.php');
    }else{    

    if($row['level'] == '0'){
    echo "Blocked";
    }
    elseif($row['level'] <3 ){
    
    $_SESSION['email']=$email;
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['level']=$row['level'];
    header('Location: adminpanel.php');

    }else{
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        header('Location: products.php');
    }

}

?>