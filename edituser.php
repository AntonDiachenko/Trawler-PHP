<?php
require 'connection.php';
session_start();

include_once("config.php");
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $result = mysqli_query($mysqli,"UPDATE users SET name ='$name',email='$email',phone = '$phone' WHERE id = $id");
    
    


    if ($row['usertype']=="user") {
        header("Location: user.php?usertype=user");
    }
    else{
        header("Location: user.php?usertype=admin");
    }
}


    $id = $_GET['id'];
    $result = mysqli_query($mysqli  , "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_array($result);
   
    
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
        <!----------------------------------------------------------------------------------------------------------  -->
        <div class="row products-reel">
            <p class="products-heading-2">Product Edit</p>
            <form name = "update_user" method="POST" action ="edituser.php" > 
                    <table>
                          
                            <tr class="col-sm-3">
                                <td>Id</td>
                                <td><input type="text" name = "id" value="<?php echo $row['id']; ?>"></td>
                            </tr>
                            <tr class="col-sm-3">
                                <td>Name</td>
                                <td><input type="text" name = "name" value="<?php echo $row['name']; ?>"></td>
                            </tr>
                            <tr class="col-sm-3">
                                <td>Email</td>
                                <td><input type="text" name = "email" value="<?php echo $row['email'] ?>"></td>
                            </tr>
                            <tr class="col-sm-3">
                                <td>Phone</td>
                                <td><input type="text" name = "phone" value="<?php echo $row['phone'] ?>"></td>
                            </tr>
                        
                            <td><input type="hidden" name = "id" value="<?php echo $row['id']; ?>"></td>
                            <td><input type="Submit" name="update" value="update"></td>
                                
          
                        
                    </table>
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