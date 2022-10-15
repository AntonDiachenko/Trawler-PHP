<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  include_once './api_connection.php';
  include_once './Api.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate object
  $api = new Api($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $api->id = $data->id;

  // Delete post
  if($api->delete()) {
    echo json_encode(
      array('message' => 'User_Item Deleted')
    );
  } else {
    echo json_encode(
      array('message' => 'User_Item was Not Deleted')
    );
  }
//Delete request 
 //http://localhost/Project_Team6/api/delete.php
  //headers key : content-type, value: application/json
  //body // raw and 
  //   {
  //    "id" : "7"
  // }
