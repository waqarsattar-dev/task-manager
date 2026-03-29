<?php 

require "database.php";
$db = new Database();

class User{
      public $name;
      public $email;


      public function __construct($name, $email){
              $this->name = $name;
              $this->email = $email;
      }

      public function getUser(){
           echo "Name: ".$this->name ."<br>";
           echo "Email: ".$this->email;
      }
}
      $user1 = new User('Waqar', 'waqardev@gmail.com');
      $user1->getUser();

?>