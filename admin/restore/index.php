<?php
require "../../config.php";

session_start();

if (!isset($_SESSION["user"]) && !$_SESSION["logged_in"]) {
    header("Location: ../login/");
    exit();
}

if (!isset($_POST["id"])) {
    header("Location: ../");
    exit();
}

$id = $_POST["id"];

try
{
    $con = new PDO("mysql:host=" . DB_servername . ";dbname=" . DB_name . ";charset=utf8mb4", DB_username, DB_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $con->prepare("SELECT * FROM `contact` WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $contactData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($contactData && $contactData["is_deleted"]) {
        $restoreStmt = $con->prepare("UPDATE `contact` SET is_deleted = :is_deleted WHERE id = :id");
        $restoreStmt->execute(['id' => $id, 'is_deleted' => 0]);
        
        echo "Kontakten från " . $contactData['name'] . " har tagits tillbaka.";
    } else {
        echo "Kontakten hittades inte.";
    }
}
catch(PDOException $e)
{
    error_log("Connection failed: " . $e->getMessage());
    echo "Ett server fel uppstod! Kontakta hemsidans ägare för hjälp.";
}