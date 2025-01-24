<?php   
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
    <form action="loggedIn.php" method="POST">
        <input type="text" name="username"><br>
        <input type="text" name="password"><br>
    <input type="submit">
</form>
    <?php   

    ?>
</body>
</html>