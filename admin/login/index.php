<?php
require "../../config.php";

session_start();

$failedLogin = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    
    $con = new PDO("mysql:host=" . DB_servername . ";dbname=" . DB_name . ";charset=utf8mb4", DB_username, DB_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM `users` WHERE name = '$username';";
    $result = $con->query($sql);

    if ($result->rowCount() > 0) {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $row["password_hash"])) {
            $_SESSION["user"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            header("Location: ../");
            exit();
        } else {
            $failedLogin = true;
        }
    } else {
        $failedLogin = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            padding: 0;
            margin: 0;

            display: flex;
            align-items: center;
            justify-content: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 500px;
            gap: 5px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Login</button>
    </form>
    
</body>
</html>