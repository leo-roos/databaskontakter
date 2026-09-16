<?php

function registerNewUser($USER_name, $USER_password, $USER_email, $USER_text) {
    $DB_servername = 'localhost';
    $DB_username = 'leo';
    $DB_password = 'jqtli5BgKld*e.tt';
    $DB_name = 'introduction';

    try
    {
        echo $DB_servername . $DB_username . $DB_password . $DB_name;
        echo "<br>";

        $con = new PDO("mysql:host=$DB_servername;dbname=$DB_name;charset=utf8mb4", $DB_username, $DB_password);
        // $con = new PDO("mysql:host = $DB_servername; dbname = $DB_name", $DB_username, $DB_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO content(name, password, email, text) VALUE('$USER_name', '$USER_password', '$USER_email', '$USER_text')";
        $stmt = $con -> prepare($sql);
        $stmt -> execute();


        echo "New user " . $USER_name . " added.";
    }

    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    $con = null;
}

if (isset($_POST['send'])) {
    $username = $_POST["user"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $text = $_POST["text"];

    echo $username . $password .$email . $text;

    registerNewUser($username, $password, $email, $text);
}
?>