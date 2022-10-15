<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="css/style_favs.css" type="text/css">
</head>
<body>
    

<div class="row my-nav">
    <div class="col-2">
        <a href="index.php" class="my-heading-1">
            <img src="img/Blue Minimal Elegant Fish Logo  (4).png" alt="Fishing" width="125" height="100">
        </a>
    </div>
    <div class="col-10">
        <ul class="nav justify-content-end my-top-nav">
            <?php
            if (isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $name = $_SESSION['name'];
                if ($email == "admin"){
                    ?>
                    </br>
                    <h5><i class="color-it2">Hello, <?php echo $name ?></i></h5>
                    <li><a href="products.php" class="nav-item my-nav-item">Products</a></li>
                    <li><a href="admin_users.php" class="nav-item my-nav-item">Manage Users</a></li>
                    <li><a href="admin_products.php" class="nav-item my-nav-item">Manage Products</a></li>
                    <li><a href="adminpanel.php" class="nav-item my-nav-item">Admin Panel</a></li>
                    <li><a href="logout.php" class="nav-item my-nav-item">Logout</a></li>
                <?php
                } else {
                ?>
                    </br>
                    <h5><i class="color-it2">Hello, <?php echo $name ?></i></h5>
                    <li><a href="index.php" class="nav-item my-nav-item">Home</a></li>
                    <li><a href="products.php" class="nav-item my-nav-item">Products</a></li>
                    <li><a href="favourites.php" class="nav-item my-nav-item">Favourites</a></li>
                    <li><a href="cart.php" class="nav-item my-nav-item">Cart</a></li>
                    <li><a href="settings.php" class="nav-item my-nav-item">Settings</a></li>
                    <li><a href="logout.php" class="nav-item my-nav-item">Logout</a></li>
                <?php
                }
                ?>
            <?php
            } else {
            ?>
                <li><a href="index.php" class="nav-item my-nav-item">Home</a></li>
                <li><a href="signup.php" class="nav-item my-nav-item">Sign Up</a></li>
                <li><a href="login.php" class="nav-item my-nav-item">Login</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>