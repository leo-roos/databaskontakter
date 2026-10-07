<?php
require "../../config.php";

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    exit();
}

$user = [];

try
{
    $con = new PDO("mysql:host=" . DB_servername . ";dbname=" . DB_name . ";charset=utf8mb4", DB_username, DB_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM `users` WHERE id = '$_SESSION[user]';";
    $result = $con->query($sql);

    if ($result->rowCount() > 0) {
        $user = $result->fetch(PDO::FETCH_ASSOC);
    }
}
catch(PDOException $e)
{
    error_log("Connection failed: " . $e->getMessage());
    echo "Ett server fel uppstod! Kontakta hemsidans ägare för hjälp.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style>
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
    </style> -->
</head>
<body>
    <h1>Logged Out</h1>
    <h2>You have been logged out <?php echo $user["name"] ?>.</h2>
    <a href="../../">Go back</a>
</body>
</html>


<?php
session_destroy();
?>