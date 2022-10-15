<?php
function check_if_added_to_favourites($item_id){
    require "connection.php";
    $userid = $_SESSION['id'];
    $result = "SELECT * FROM fav_items where item_id='$item_id' and user_id='$userid' ";

    $test = mysqli_query($conn,$result);
    $numofrows = mysqli_num_rows($test);
    if($numofrows>=1){
        return 1;
    }else{
    return 0;
    }
}


?>