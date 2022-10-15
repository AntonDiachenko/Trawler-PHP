<?php
include_once "connection.php";
include_once "checkifadded.php";
include_once "checkifaddedtofav.php";
session_start();
?>


<?php
require 'connection.php';

$result = "SELECT id, name, price FROM items";

$dbresult = mysqli_query($conn, $result);
$numofrow = mysqli_num_rows($dbresult);
$emptyFav = "";
if ($numofrow == 0) {
    $emptyFav = "No favourites";
} else {
    $row = mysqli_fetch_array($dbresult);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <?php
        require 'header.php';
        ?>
        <div class="row products-reel">
            <p class="products-heading-2">Choose Your Product</p>
            <?php
            $test = mysqli_query($conn, $result) or die(mysqli_error($conn));
            $numofProduct = mysqli_num_rows($test);
            while ($row = mysqli_fetch_array($test)) {
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail one-product-container">
                        <img src="img/product<?php echo $row['id'] ?>.jpg">
                        <div class="caption">
                            <h3><?php echo $row['name'] ?></h3>
                            <h5><?php echo "Price: $". $row['price'] ?></h5>
                            <?php if (!isset($_SESSION['email'])) {  ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                if (check_if_added_to_cart($row['id'])) {
                                    echo '<p>Added to cart</p><br>';
                                } else {
                                ?>
                                    <a href="cart_add.php?id=<?php echo $row['id'] ?>" class="btn btn-block btn-primary" name="add" value="add">Add to cart</a><br>
                                <?php
                                }
                                if (check_if_added_to_favourites($row['id'])) {
                                    echo '<p>Added to favourites</p>';
                                } else {
                                ?>
                                    <a href="favourites_add.php?id=<?php echo $row['id'] ?>" class="btn btn-block btn-primary" name="add-favourites" value="add-favourites">Add to favourites</a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php 
            } 
            ?>
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