<?php
require 'connection.php';
include_once("config.php");
session_start();

$usertype = $_GET['usertype'];

$result = "SELECT * FROM users where usertype = '$usertype' and level !=0;";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trawler - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/user_list.css">
</head>


<body>

    <div class="container">
        <?php
        require 'header.php';
        ?>
        <!----------------------------------------------------------------------------------------------------------  -->
        <div class="row products-reel">
            <!-- <p class="products-heading-2">User List</p> -->
            <div class="adduserRef"><a href="adduser.php">Add user</a></div><br>
            <div class="col-sm-12">
                <div class="caption">
                    <table class="table table-striped">
                        <!-- <thead>
                            <tr>
                                <h2>UserList</h2>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">phone</th>
                            </tr>
                        </thead> -->
                        <?php
                        $test = mysqli_query($conn, $result) or die(mysqli_error($conn));
                        $numofrows = mysqli_num_rows($test);
                        if ($numofrows > 0) {
                            echo "<thead><tr>
                                <h2>UserList</h2>
                            </tr>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>phone</th>
                            </tr></thead>";
                        }
                        while ($row = mysqli_fetch_array($test)) {
                            echo "<tr>";
                            echo "<td scope='row'> " . $row['id'] . "</td>";
                            echo "<td> " . $row['name'] . "</td>";
                            echo "<td> " . $row['email'] . "</td>";
                            echo "<td> " . $row['phone'] . "</td>";

                            echo "<td><a href = 'edituser.php?id=$row[id]'>EDIT</a> | <a href = 'deleteuser.php?id=$row[id]'>Delete</a> | <a href = 'blockuser.php?id=$row[id]'>Block</a>";

                            echo "</tr>";
                        }
                        ?>

                    </table>
                    <table class="table table-striped">
                        <!-- <thead>


                            <tr>
                                <h2>Blocked UserList</h2>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">phone</th>
                            </tr>

                                    
                        </thead> -->
                        <?php
                        $result1 = "SELECT * FROM users where usertype = '$usertype' and level =0;";
                        $test1 = mysqli_query($conn, $result1) or die(mysqli_error($conn));
                        $numofrows1 = mysqli_num_rows($test1);
                        if ($numofrows1 > 0) {
                            echo "<thead><tr>
                                <h2>Blocked UserList</h2>
                            </tr>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>phone</th>
                            </tr></thead>";
                        }


                        while ($row1 = mysqli_fetch_array($test1)) {
                            echo "<tr>";
                            echo "<td scope='row'> " . $row1['id'] . "</td>";
                            echo "<td> " . $row1['name'] . "</td>";
                            echo "<td> " . $row1['email'] . "</td>";
                            echo "<td> " . $row1['phone'] . "</td>";
                            echo "<td> <a href = 'deleteuser.php?id=$row1[id]'>Delete</a> | <a href = 'unblockuser.php?id=$row1[id]'>Unblock</a>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </div>

            </div>
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