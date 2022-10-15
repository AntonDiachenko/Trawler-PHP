<?php

include_once("config.php");

$id = $_GET['id'];


$result_usertype = mysqli_query($mysqli,"select * from users WHERE id = $id");
    $row_usertype=mysqli_fetch_array($result_usertype);

$result_fav = mysqli_query($mysqli , "DELETE FROM fav_items WHERE user_id = $id;");
$result_users_items = mysqli_query($mysqli , "DELETE FROM users_items WHERE user_id = $id;");
$result_users = mysqli_query($mysqli , "DELETE FROM users WHERE id = $id;");


if ($row_usertype['usertype']=="user") {
    header("Location: user.php?usertype=user");
}
else{
    header("Location: user.php?usertype=admin");
}

?>