<?php

include_once("config.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli , "DELETE FROM items WHERE id = $id");


header("location:admin_products.php");


?>