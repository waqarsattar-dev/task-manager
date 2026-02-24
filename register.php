<?php 
require 'database.php';
$db = new Database();

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

     $sql = "INSERT INTO users (name,email,password) value ('$name', '$email', '$password')";

     if($db->conn->query($sql)){
        echo "User register successfully!";
     }else{
        echo "Error: ".$db->conn->error;
     }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>User Register</h1>
    <form method="POST" action="">
           <label>Name:</label><br>
          <input type="text" name="name" required><br><br>
           <label>Email:</label><br>
          <input type="email" name="email" required><br><br>
           <label>Password:</label><br>
          <input type="password" name="password"> <br><br>
          <button type="register" name="register">Register</button>
    </form>
</body>
</html>