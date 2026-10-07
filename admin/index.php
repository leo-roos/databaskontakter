<?php
require "../config.php";

session_start();

if (!isset($_SESSION["user"]) && !$_SESSION["logged_in"]) {
    header("Location: login/");
    exit();
}

$contactArray = [];
$user = [];

try
{
    $con = new PDO("mysql:host=" . DB_servername . ";dbname=" . DB_name . ";charset=utf8mb4", DB_username, DB_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM `contact`;";
    $result = $con->query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        array_push($contactArray, $row);
    }

    $sql = "SELECT * FROM `users` WHERE id = '$_SESSION[user]';";
    $result = $con->query($sql);

    if ($result->rowCount() > 0) {
        $user = $result->fetch(PDO::FETCH_ASSOC);
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/w3_y6jI.css">
</head>
<body class="w3-content" style="max-width:1500px">
    <div class="w3-flex w3-top w3-white w3-wide w3-padding w3-card" style="max-width:1500px">
        <a href="" class="w3-button">
            <b>BR</b> Architects Dashboard
        </a>
        <nav class="w3-flex w3-hide-small" style="margin-left:auto">
            <a href="../" class="w3-button">Go to site</a>
            <a href="logout" class="w3-button">Logout</a>
        </nav>
    </div>
    
    <section id="welcome" class="w3-container w3-padding-32">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Välkommen <?php echo htmlspecialchars($user["name"]) ?>!</h2>
        <p>Här kan du se vilka personer som vill komma i kontakt med dig.</p>
    </section>


    <section id="contacts" class="w3-container">
        <h2 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contacts</h2>

        <div class="w3-grid" style="grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">
            <?php
                try
                {
                    foreach($contactArray as $row) {
                        ?>

                        <div class="w3-display-container">
                            <div>ID: <?php echo htmlspecialchars($row["id"]); ?></div>
                            <div>Name: <?php echo htmlspecialchars($row["name"]); ?></div>
                            <div>E-mail: <?php echo htmlspecialchars($row["email"]); ?></div>
                            <div>Subject: <?php echo htmlspecialchars($row["subject"]); ?></div>
                            <div>Comment: <?php echo htmlspecialchars($row["comment"]); ?></div>

                           <form action="delete/index.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                
                                <button type="submit" onclick="return confirm('Är du säker på att du vill radera detta?');">
                                    Radera
                                </button>
                            </form>
                        </div>

                        <?php
                    }
                }

                catch(PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                }
            ?>
        </div>
    </section>

</body>
</html>