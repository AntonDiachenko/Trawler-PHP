<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style_favs.css" type="text/css">
</head>

<body>
    <div class="container body-outer-container">
        <?php
        require 'header.php';
        ?>
         <div class="row justify-content-center  ">
          <div class="col-lg-6 text-center p-2 mb-1  rounded-3 banner ">
            <h2 class="display-3 color-it ">Welcome to Trawler</h2>
            <h4 class="color-it p-2 ">Your trusted supplier of high quality fishing gear!</h4>
            <a href="products.php" class="btn btn-primary p-2 " role="button">View Products</a>
          </div>
        </div>
        
        <div class="row">
            <div class="col home-thumbnail">
                <a href="products.php">
                    <img class="img-fluid img-thumbnail" src="img/reel-bg.jpg" alt="fishing reel">
                </a>
                <h2>Reels</h2>
            </div>
            <div class="col home-thumbnail">
                <a href="products.php">
                    <img class="img-fluid img-thumbnail" src="img/lure-bg.jpg" alt="lure">
                </a>
                <h2>Lures</h2>
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