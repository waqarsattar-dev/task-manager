<?php

class Database{

public $conn;

public function __construct(){

$this->conn = new mysqli("localhost","root","","waqar_practice");   

if($this->conn->connect_error){
    die("Connection Failed");
 }

 echo "Database connected successfully!<br>";
    
}

}

?>