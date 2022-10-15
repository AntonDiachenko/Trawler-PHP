<?php
class Api{

    // DB stuff
    private $conn;
    private $table = 'users_items';

    // user_items
    public $id;
    public $user_id;
    public $item_id;
    public $status_cart;
    public $itemName;
    public $userName;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get user_items
    public function read() {
      // Create query
      $query = 'SELECT ui.id, 
                        u.name as userName, 
                        i.name as itemName, 
                        i.price 
                       FROM ' . $this->table . ' ui
                        LEFT JOIN users u
                        ON ui.user_id = u.id
                        LEFT JOIN items i
                        ON ui.item_id = i.id
                        ORDER by ui.id';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);//PDO

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single user_item
    public function read_single() {
          // Create query
          $query = 'SELECT ui.id, 
                            u.name as userName, 
                            i.name as itemName, 
                            i.price 
                            FROM ' . $this->table . ' ui
                            LEFT JOIN users u
                            ON ui.user_id = u.id
                            LEFT JOIN items i
                            ON ui.item_id = i.id
                            WHERE
                            i.name = ?
                            LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->itemName);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->userName = $row['userName'];
          $this->itemName = $row['itemName'];
          $this->price = $row['price'];
    }


//delete 

public function delete() {
  // Create query
  $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt->bindParam(':id', $this->id);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
  }
}


?>