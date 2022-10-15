<?php
require 'connection.php';
session_start();
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

    <div class="container">
        <?php
        require 'header.php';
        ?>
        <!----------------------------------------------------------------------------------------------------------  -->
        <div class="row products-reel">
            <p class="products-heading-2">User Edit</p>
            <form method="POST" enctype="multipart/form-data">

                <table>
                    <tr>
                        <td>Usertype</td>
                        <td><input type="text" name="usertype" value="user"></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password"></td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="phone"></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input type="text" name="city"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address"></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td><input type="text" name="level" value="3"></td>
                    </tr>
                </table>
                <input type="Submit" name="submit" value="Add" class="btn btn-primary">
            </form>
            <?php

            if (isset($_POST['submit'])) {
                $usertype = $_POST['usertype'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);

                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $address = $_POST['address'];
                $level = $_POST['level'];
                include_once("config.php");
                $result = mysqli_query($mysqli, "INSERT INTO `users` (`usertype`, `name`, `email`, `password`, `phone`, `city`, `address`, `level`) VALUES ('$usertype','$name','$email','$password','$phone','$city','$address','$level')");




                if ($usertype == "user") {
                    header("Location: user.php?usertype=user");
                } else {
                    header("Location: user.php?usertype=admin");
                }
            }
            ?>
            </form>
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