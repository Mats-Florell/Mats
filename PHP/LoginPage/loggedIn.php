<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logined</title>
    </head>
    <body>

        <?php  
        
            // Set session variables
            $_SESSION["username"]= $_POST["username"];
            $_SESSION["password"]= $_POST["password"];
            
            // Echo session variables that were set on previous page
            echo "my username is " . $_SESSION["username"] . "<br>";
            echo "my password is " . $_SESSION["password"] . "<br>";
           
        ?>
    </body>
</html>
