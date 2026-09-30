<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login/");
    exit();
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
    <h2>You have been logged out <?php echo $_SESSION["username"] ?>.</h2>
    <a href="../../">Go back</a>
</body>
</html>


<?php
session_destroy();
?>