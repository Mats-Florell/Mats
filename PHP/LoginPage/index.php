<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <form method="POST" action="loggedIn.php">
            <label  type="text" for="userName">Username: </label>
            <input id="userName" name="username"><br>
            <label for="passWord">Password: </label>
            <input type="text" id="passWord" name="password"><br>
            <input type="submit" value="Submit">
        </form>

        
    </body>
</html>
