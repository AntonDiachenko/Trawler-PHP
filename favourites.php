<?php
include_once "connection.php";
include_once "checkifadded.php";
include_once "checkifaddedtofav.php";
session_start();


if (!isset($_SESSION["email"])) {
    header('Location: login.php');
}

?>

<?php
$begin = "SELECT list_name FROM fav_items";
$QueryBegin = mysqli_query($conn, $begin);
$beginRow = mysqli_num_rows($QueryBegin);

$name = $_SESSION['name'];
$userId = $_SESSION['id'];
$result = "SELECT a.item_id, b.name , b.price
            FROM fav_items a, items b
                WHERE a.item_id = b.id
                and a.user_id = $userId
                and a.list_name = 'general_list'";

$dbresult = mysqli_query($conn, $result);
//print_r($dbresult);
$numofrow = mysqli_num_rows($dbresult);
//print_r($numofrow);
$sum = 0;
$emptyFav = "";
if ($numofrow == 0) {
    $emptyFav = "You have no favourites";
} else {
    $row = mysqli_fetch_array($dbresult);
    //print_r($row);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Favourites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_favs.css">
    <?php
    $fav_list_item = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fav_list_item = $_POST["fav_list_item"];
    }

    ?>
</head>

<body>

    <div class="container cart-container">
        <?php
        require 'header.php';
        ?>
        <div class="col products-reel">
            <p class="products-heading-2">Favourites</p>

            <form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
                <div class="create_list_container">
                    <p>To create a new list enter its name and select products<p>
                    <input type="text" name="list-name" id="list-name">
                    <button type="submit" class="btn btn-primary create-list-btn">Create List</button>
                </div>
                <div class="container cart-table-container">
                    <div class="table-responsive-sm">
                        <table class="table table-success table-favs">
                            <tr>
                                <th>Product photo</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                            <?php
                            $test = mysqli_query($conn, $result) or die(mysqli_error($conn));
                            $numofProduct = mysqli_num_rows($test);
                            while ($row = mysqli_fetch_array($test)) {
                            ?>
                                <tr>
                                    <td><img src="img/product<?php echo $row['item_id'] ?>.jpg"></td>
                                    <td class="table-cell-favs"><?php echo $row['name'] ?></td>
                                    <td class="table-cell-favs"><?php echo $row['price'] ?></td>
                                    <td class="remove-cell">
                                        <a href="favourites_remove.php?id=<?php echo $row['item_id'] ?>" class="btn btn-block btn-primary">Remove</a><br>
                                        <?php
                                        if (check_if_added_to_cart($row['item_id'])) {
                                            echo '<p>Added to cart</p><br>';
                                        } else {
                                        ?>
                                            <a href="cart_add_from_favs.php?id=<?php echo $row['item_id'] ?>" class="btn btn-block btn-primary" name="add" value="add">Add to cart</a><br>

                                        <?php
                                        }
                                        ?>
                                        <label>Add to list</label>
                                        <?php $tmp = $row['item_id'] ?>
                                        <input type="checkbox" name="fav_list_item[]" <?php echo $row['item_id'] ?>" value=<?php print $tmp ?>>
                                    </td>
                                </tr>
                            <?php
                                $itemId = $row['item_id'];
                                //                        $addFavItem = ("INSERT INTO fav_items(user_id,item_id,list_name,status_cart,status_fav) values ('$userId', '$itemId', 'new', '', 'Added to favourites');");
                                //                        $addFavItemResult = mysqli_query($conn, $addFavItem);
                            }
                            ?>
                        </table>
                    </div>
                    <div class="emptyCart-container">
                        <span id="emptyFav"><?php echo $emptyFav; ?></span>
                    </div>
                </div>
            </form>


            <?php
            if (isset($_POST['list-name'])) {
                $listName = ($_POST['list-name']);
                //  echo "Items selected are : " . "</br>";
                if ($fav_list_item) {
                    foreach ($fav_list_item as $itemId) {
                        //   echo $itemId, "</br>";
                        $favUpdateQuery = ("insert into fav_items SET list_name='$listName', user_id = '$userId', item_id = '$itemId';");
                        $favUpdateResult = mysqli_query($conn, $favUpdateQuery);
                    }
                }
                // echo $userId;
                // echo $listName;



                //print_r($fetchFavList);
            ?>
                <p class="products-heading-2">List <?php echo $listName ?> created!</p>
                <div class="container cart-table-container">
                    <table class="table table-success table-lg table-favs">
                        <tr>
                            <th>Product photo</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        <?php
                        //$numofrow = mysqli_num_rows($fetchFavList);
                        // $i = 0;
                        // while ($i < $numofrow) {
                        foreach ($fav_list_item as $itemId) {
                            // echo $itemId, "</br>";
                            $favListResult = ("SELECT a.item_id, b.name, b.price
                                FROM fav_items a inner join  items b
                                    on a.item_id = b.id
                                    where a.user_id = '$userId'
                                    and a.list_name = '$listName' and a.item_id= '$itemId';");
                            $fetchFavList = mysqli_query($conn, $favListResult);
                            $myFavsArray = mysqli_fetch_array($fetchFavList);
                        ?>
                            <tr>
                                <td><img src="img/product<?php echo $myFavsArray['item_id'] ?>.jpg"></td>
                                <td class="table-cell-favs"><?php echo $myFavsArray['name'] ?></td>
                                <td class="table-cell-favs"><?php echo $myFavsArray['price'] ?></td>
                                <td class="remove-cell">
                                    <a href="favourites_remove.php?id=<?php echo $myFavsArray['item_id'] ?>" class="btn btn-block btn-primary">Remove</a><br>
                                    <?php
                                    if (check_if_added_to_cart($myFavsArray['item_id'])) {
                                        echo '<p>Added to cart</p><br>';
                                    } else {
                                    ?>
                                        <a href="cart_add_from_favs.php?id=<?php echo $myFavsArray['item_id'] ?>" class="btn btn-block btn-primary" name="add" value="add">Add to cart</a><br>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                            //  echo $myFavsArray['item_id'];
                            //   $i++;
                            //   }
                        }
                        ?>
                    </table>
                </div>

            <?php
            }
            ?>



            <?php
            if ($beginRow > 0) {
                $Query1 = "SELECT list_name FROM fav_items";
                $Qresult1 = mysqli_query($conn, $Query1);
                //print_r($Qresult1);
                foreach ($Qresult1 as $qr) {
                    //echo $qr['list_name'];
                    $arrayListName[] = $qr['list_name'];
                }
                ?>
                <p class="products-heading-2">Previous lists created by <?php echo $name ?></p>
                <?php
                $arrayListName = array_unique($arrayListName);
                //print_r($arrayListName);
                foreach ($arrayListName as $thisList) {
                    ?>
                    <p class="products-heading-2"><?php echo $thisList ?></p>
                    <?php
                    $Query2 = "SELECT item_id FROM fav_items WHERE user_id = $userId and list_name = '$thisList'";
                    //echo $Query2;
                    $Qresult2 = mysqli_query($conn, $Query2);
                    $arrayItemId = array();
                    foreach ($Qresult2 as $itemId) {
                        //echo "itemid" .$itemId['item_id'] ." , ";
                        $arrayItemId[] = $itemId['item_id'];
                    }
                    // echo json_encode($arrayItemId);
                    foreach ($arrayItemId as $item) {
                        //if($item != ""){
                        //echo "hello" .$item;
                        $Query3 = "SELECT a.item_id, b.name , b.price
                            FROM fav_items a, items b
                                WHERE a.item_id = b.id
                                and a.user_id = $userId
                                and a.list_name = '$thisList'
                                and a.item_id = $item ";
                        $Qresult3 = mysqli_query($conn, $Query3);
                        //$myFavsArray = mysqli_fetch_array($Qresult3);
                        foreach ($Qresult3 as $myFavsArray) {
                            //echo $Query3;
            ?>
                            <div class="container cart-table-container">
                                <table class="table table-success table-lg table-favs">
                                    <tr>
                                        <th>List Name</th>
                                        <th>Product photo</th>
                                        <th>Product name</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <!-- <td class="table-cell-favs"><?php echo $thisList ?></td> -->
                                        <td><img src="img/product<?php echo $myFavsArray['item_id'] ?>.jpg"></td>
                                        <td class="table-cell-favs"><?php echo $myFavsArray['name'] ?></td>
                                        <td class="table-cell-favs"><?php echo $myFavsArray['price'] ?></td>
                                        <td class="remove-cell">
                                            <a href="favourites_remove.php?id=<?php echo $myFavsArray['item_id'] ?>" class="btn btn-block btn-primary">Remove</a><br>
                                            <?php
                                            if (check_if_added_to_cart($myFavsArray['item_id'])) {
                                                echo '<p>Added to cart</p><br>';
                                            } else {
                                            ?>
                                                <a href="cart_add_from_favs.php?id=<?php echo $myFavsArray['item_id'] ?>" class="btn btn-block btn-primary" name="add" value="add">Add to cart</a><br>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>

            <?php
                            //}
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
<div class="container products-footer-container">
    <footer>
        <div class="products-copyright-container">
            <p class="color-it">&copy; 2022 Trawler. All rights reserved.</p>
        </div>
    </footer><br>
</div>

</html>