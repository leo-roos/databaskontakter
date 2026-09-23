<?php

function registerNewUser($USER_name, $USER_email, $subject, $comment) {
    $DB_servername = 'localhost';
    $DB_username = 'root';
    $DB_password = '';
    $DB_name = 'introduction';

    try
    {
        $con = new PDO("mysql:host=$DB_servername;dbname=$DB_name;charset=utf8mb4", $DB_username, $DB_password);
        // $con = new PDO("mysql:host = $DB_servername; dbname = $DB_name", $DB_username, $DB_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO contact(name, email, subject, comment) VALUE('$USER_name', '$USER_email', '$subject', '$comment')";
        $stmt = $con -> prepare($sql);
        $stmt -> execute();

        echo "New request " . $USER_name . " added to contacts.";

        header("Location: /databaskontakter/");
    }

    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    $con = null;
}

if (isset($_POST['Name'])) {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $subject = $_POST["Subject"];
    $comment = $_POST["Comment"];

    echo $name . $email . $subject . $comment;

    registerNewUser($name, $email, $subject, $comment);
}
?>