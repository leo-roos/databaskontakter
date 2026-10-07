<?php
require "config.php";

function registerNewUser($USER_name, $USER_email, $subject, $comment) {
    try
    {
        $con = new PDO("mysql:host=" . DB_servername . ";dbname=" . DB_name . ";charset=utf8mb4", DB_username, DB_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO contact (name, email, subject, comment) VALUES (:name, :email, :subject, :comment)";
        $stmt = $con -> prepare($sql);
        $stmt->execute([
            'name' => $USER_name,
            'email' => $USER_email,
            'subject' => $subject,
            'comment' => $comment
        ]);


        // echo "New request " . $USER_name . " added to contacts.";

        header("Location: index.php#contact");
    }

    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    $con = null;
    exit();
}

if (isset($_POST['Name'])) {
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $subject = $_POST["Subject"];
    $comment = $_POST["Comment"];

    registerNewUser($name, $email, $subject, $comment);
}