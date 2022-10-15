<?php
include_once "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container body-outer-container">
        <?php
        require 'header.php';
        ?>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 my-signup-form">
                    <h1 class="color-it" >SIGN UP</h1>
                    <form method="post" action="user_registration_script.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="phone" placeholder="Phone" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" required="true">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="true">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br><br><br>
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