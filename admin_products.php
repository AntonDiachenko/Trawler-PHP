
<?php
require 'connection.php';
session_start();
$result = "SELECT id, name, price FROM items";

$dbresult = mysqli_query($conn, $result);

$row = mysqli_fetch_array($dbresult);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_adm_products.css">
</head>


<body>

    <div class="container body-outer-container">
        <?php
        require 'header.php';
        ?>
        <!----------------------------------------------------------------------------------------------------------  -->
        <div class="row products-reel">
            <p class="products-heading-2">Product List</p>
            <div class="adduserRef"><a href="add.php" >Add Product</a></div>
            <?php
            $test = mysqli_query($conn, $result) or die(mysqli_error($conn));
            $numofProduct = mysqli_num_rows($test);
            while ($row = mysqli_fetch_array($test)) {
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail one-product-container">
                        <img src="img/product<?php echo $row['id'] ?>.jpg">
                        <div class="caption">
                            <h3><?php 
                            echo "Product: ".$row['name'] ;
                            echo "<br>" ;
                            echo "Price: $". $row['price'] ;
                            echo "<br>" ;
                            echo "<td><a href = 'edit.php?id=$row[id]'>EDIT</a> | <a href = 'delete.php?id=$row[id]'>Delete</a>";
                            ?></h3>
                           
                        </div>
                    </div>
                </div>
            <?php 
            } 
            ?>
            <div class="adduserRef"><a href="add.php" >Add Product</a></div>
        </div>
        <!----------------------------------------------------------------------------------------------------------  -->
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