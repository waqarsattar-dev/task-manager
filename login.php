<?php

session_start();

require "database.php";
$db = new Database();
$conn = $db->connect();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid Email & Password";
    }
}

?>

<h2>User Login</h2>
<form method="POST" action="">
    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="email" required /><br><br>
    <label for="password">Password: </label>
    <input type="password" name="password" placeholder="password" required /><br><br>
    <button type="submit" name="login">Login</button>
</form>
</body>

</html>