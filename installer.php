<?php
if (file_exists("config.php")) {
    $mainURL = str_replace(dirname(dirname(__FILE__)), "", dirname((__FILE__)));

    header("Location: $mainURL");
}

$variablesNeeded = [
    [
        "name" => "DB_servername",
        "type" => "text",
        "default" => "localhost",
        "required" => true
    ],
    [
        "name" => "DB_username",
        "type" => "text",
        "default" => "root",
        "required" => true
    ],
    [
        "name" => "DB_password",
        "type" => "password",
        "default" => "",
        "required" => false
    ],
    [
        "name" => "DB_name",
        "type" => "text",
        "default" => "introduction",
        "required" => true
    ],
];

// echo $_POST["sent"] && $_POST["sent"] == "true";
if (isset($_POST["sent"]) && $_POST["sent"] == "true") {
    $configFile = fopen("config.php", "w");

    if ($configFile) {
        $content = "<?php\n";

        foreach ($variablesNeeded as $field) {
            $name = $field["name"];
            $value = $_POST[$name] ?? $field["default"];
            $content .= "define('" . $name . "', " . var_export($value, true) . ");\n";
        }

        $content .= "?>\n";
        fwrite($configFile, $content);
        fclose($configFile);
    }

    $mainURL = str_replace(dirname(dirname(__FILE__)), "", dirname((__FILE__)));

    header("Location: $mainURL");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <?php
    foreach ($variablesNeeded as $key => $value) {
        echo "<label for=" . $value['name'] . ">" . $value['name'] . "</label>";
        echo "<input style=\"margin-left: 20px\" type=\"text\" name=" . $value['name'] . " id=" . $value['name'] . " placeholder=" . $value['name'] . " value=" . $value['default'] . " >";
        echo "<br>";
        echo "<br>";
    }
    ?>
    <input type="hidden" name="sent" value="true">
    <button type="submit">Submit</button>
</form>
    
</body>
</html>