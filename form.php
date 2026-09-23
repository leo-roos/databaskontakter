<?php include 'db-connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Databaskontakter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Hello World!</h2>

    <div class="form">
        <form action="" method="post">
            <label for="user">User</label>
            <input type="text" name="user" required>
            
            <label for="password">Password</label>
            <input type="password" name="password" required>
            
            <label for="email">E-Mail</label>
            <input type="email" name="email" required>
            
            <label for="text">Content</label>
            <input type="text" name="text" required>

            <button type="submit" name="send" value="register">Register</button>
        </form>
    </div>
</body>
</html>