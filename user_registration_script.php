<?php

include_once "connection.php";
session_start();

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
if(!preg_match($reg_email , $email)){
    echo "Please enter valid email";
}

$password = md5(mysqli_real_escape_string($conn,$_POST['password']));

if(strlen($password)<6){
    echo "Password should be bigger than 6 characters";
}

$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$city = mysqli_real_escape_string($conn,$_POST['city']);
$address = mysqli_real_escape_string($conn,$_POST['address']);

$dupcheck = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($conn , $dupcheck);

if(mysqli_num_rows($result)>0){
  echo "This user already exists";
}else{
$user_reg_query = "INSERT into users(name,email,password,phone,city,address)
                    values ('$name','$email','$password','$phone','$city','$address')";
    mysqli_query($conn , $user_reg_query);
    echo "You're succesfully signed-up.";

    $user_query = "SELECT * FROM users WHERE email='$email' and password='$password'";
    $user_result = mysqli_query($conn , $user_query );
    $myarray=mysqli_fetch_array($user_result);

    $_SESSION['email']= $email;
    $_SESSION['id']=$myarray['id'];
    $_SESSION['name']=$myarray['name'];
    header('Location: products.php');

}






?>