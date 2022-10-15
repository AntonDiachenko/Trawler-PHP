<?php
session_start();
require 'connection.php';

if(!isset($_SESSION["email"])){
    header('Location: login.php');
}


$userId = $_SESSION['id'];
$result = "SELECT a.item_id as id, a.status_cart, b.name , b.price
            FROM users_items a, items b
                WHERE a.item_id = b.id
                and a.user_id = $userId";

$dbresult = mysqli_query($conn, $result);
$numofrow = mysqli_num_rows($dbresult);
$sum = 0;
$emptyCart = "";
if ($numofrow == 0) {
    $emptyCart = "Cart is empty";
} else {
    while ($row = mysqli_fetch_array($dbresult)) {
        $sum = $sum + $row['price'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <div class="container cart-container">
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="emptyCart-container">
                <span id="emptyCart"><?php echo $emptyCart; ?></span>
            </div>
            <div class="container cart-table-container">
                <table class="table table-success table-sm table-striped">
                    <tr>
                        <th>Item Number</th>
                        <th>Item name</th>
                        <th>Item price</th>
                        <th></th>
                    </tr>
                    <?php
                    $test = mysqli_query($conn, $result) or die(mysqli_error($conn));
                    $numofProduct = mysqli_num_rows($test);
                    $counter = 1;
                    while ($row = mysqli_fetch_array($test)) {
                    ?>
                        <tr>
                            <td><?php echo $counter ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td class="remove-cell"><a href='cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></td>
                        </tr>
                    <?php $counter = $counter + 1;
                    } ?>
                    <tr>
                        <th></th>
                        <th>Total</th>
                        <th> $<?php echo $sum; ?></th>
                        <th>
                    </tr>
                </table>
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