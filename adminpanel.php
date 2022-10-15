<?php
require 'connection.php';
session_start();

if(!isset($_SESSION["email"])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>

    <div class="container body-outer-container">
        <?php
        require 'header.php';
        ?>

        <div class="row">
            <div class="col home-thumbnail">
                <a href="admin_users.php">
                    <img class="img-fluid img-thumbnail" src="img/users.jpg" alt="fishing reel">
                </a>
                <h2>Manage Users</h2>
            </div>
            <div class="col home-thumbnail">
                <a href="admin_products.php">
                    <img class="img-fluid img-thumbnail" src="img/products.jpg" alt="lure">
                </a>
                <h2>Manage Products</h2>
            </div>
        </div>
    </div>
    <div class="container products-footer-container">
        <footer>
            <div class="products-copyright-container">
                <p class="color-it">&copy; 2022 Trawler. All rights reserved.</p>
            </div>
        </footer><br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>