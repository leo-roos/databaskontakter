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
    
    $sql = "DELETE FROM `contact` WHERE id=``;";
    $result = $con->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        array_push($contactArray, $row);
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>