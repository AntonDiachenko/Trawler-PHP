<?php
session_start();
require 'connection.php';
?>

<?php
include_once("config.php");
include_once "connection.php";
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    $result = mysqli_query($mysqli, "UPDATE users SET name ='$name',password='$password',phone='$phone',city='$city',address='$address' WHERE id = $id");
    header("Location: index.php");
}
?>

<?php
$id = $_SESSION['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

while ($user_data = mysqli_fetch_array($result)) {
    $id = $user_data['id'];
    $name = $user_data['name'];
    $password = $user_data['password'];
    $phone = $user_data['phone'];
    $city = $user_data['city'];
    $address = $user_data['address'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-settings.css">
</head>


<body>
    <div class="container settings-container">
        <?php
        require 'header.php';
        ?>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4 my-signup-form">
                <h1><b>Change Your Settings</b></h1>
                <form method="post" action="settings.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required="true" value="<?php echo $name; ?>">
                        <label for="name" class="settings-label">User Name</label>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" required="true" pattern=".{6,}" value="<?php echo $password; ?>">
                        <label for="password" class="settings-label">Password</label>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="phone" required="true" value="<?php echo $phone; ?>">
                        <label for="phone" class="settings-label">Phone</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="city" required="true" value="<?php echo $city; ?>">
                        <label for="city" class="settings-label">City</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" required="true" value="<?php echo $address; ?>">
                        <label for="address" class="settings-label">Address</label>
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit" name="update">
                        <input type="reset" class="btn btn-primary" value="Clear">
                    </div>
                </form>
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