<?php
session_start();

require 'database.php';
$db = new Database();
$conn = $db->connect();

$errors = [];
$name = "";
$email = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name)) {
        $errors['name'] = "Name is required!";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    } else {
        $check = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $check->bindParam(':email', $email);
        $check->execute();

        if ($check->rowCount() > 0) {
            $errors['email'] = "Email already exist!";
        }
        
    }

    if (empty($password)) {
        $errors['password'] = "Password is required!";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be 6 character!";
    }

    if (empty($errors)) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);

        $stmt->execute();

        echo "User Registed Successfully!";
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
        <input type="text" name="name" placeholder="name" required value="<?php echo $name; ?>"><br>
        <span style="color:red">
            <?php echo $errors['name'] ?? ''; ?><br><br>
        </span>
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="email" value="<?php echo $email ?>" required><br>
        <span style="color:red">
            <?php echo $errors['email'] ?? ''; ?><br><br>
        </span>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="password" required><br>
        <span style="color:red">
            <?php echo $errors['password'] ?? ''; ?><br><br>
        </span>
        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>