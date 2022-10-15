<?php
//headers for accessing http
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once './api_connection.php';
include_once './Api.php';


//connect
$database = new Database();
$db = $database->connect();

//instantiate  post object
$api = new Api($db);

//post query
$result = $api->read();
//get howmany 
$num = $result->rowCount();

//check if there is any

if($num > 0){

    $api_arr = array();
        //fetch as associate to it
    while($row  = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $api_item =array(
            'id' => $id,
            'userName' => $userName,
            'itemName' => $itemName,
            'price' => $price
        );

        array_push($api_arr, $api_item);

    }
    echo json_encode($api_arr);
}else{
    echo json_encode(array('message'=> 'nothing found'));
}



// POSTMAN 
// http://localhost/Project_Team6/api/read.php
?>

