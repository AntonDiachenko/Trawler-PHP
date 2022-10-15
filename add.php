

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
        <form method="POST"  enctype="multipart/form-data">
            <label>Selected file : </label>
            <input type="file" name="fileToUpload">
            
            <table>           
                <tr >
                    <td>Name</td>
                    <td><input type="text" name = "name"></td>
                </tr>
                <tr >
                    <td>Price</td>
                    <td><input type="text" name = "price"></td>
                </tr>
            </table>
            <input type="Submit" name="submit" value="Add">
        </form>        
        <?php
      
            if(isset($_POST['submit'])){

                $target_path = "C:/XAMPP/htdocs/Project_v5/img/";  
                $target_file=$target_path.basename($_FILES["fileToUpload"]["name"] ); 
            
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                {
                    echo "GOOd";
                }
                else{
                    echo "Bad";
                }
                    
                $name = $_POST['name'];
                $price = $_POST['price'];
                include_once("config.php");         
                $result = mysqli_query($mysqli , "INSERT INTO items(name , price) VALUES ('$name','$price')");

                
                $result_id = mysqli_query($mysqli , "SELECT * FROM items order by id desc limit 0,1");
                $row = mysqli_fetch_array($result_id);
                $id = $row["id"];
                
                rename($target_file, './img/product'.$id.'.jpg');
             

             

                header("Location: admin_products.php");
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