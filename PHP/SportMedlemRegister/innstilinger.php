<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

    if (isset($_SESSION['innlogging'])==1) {
        
    }else{
        header('Location: index.php');
        exit;
    }
?>
<head>
    <meta charset="UTF-8">

    <title>Innstillinger</title>
    <link rel="stylesheet" href="bilregister.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"  />
</head>
<body>
    <header>
        <nav>

           <tr class="navButtons"><a href="biler.php" class="navButtons">Biler</a></tr>
            <tr><a href="eiere.php" class="navButtons">Eiere</a></tr>
            <tr><a href="./" class="navButtons">Senere</a></tr>
            <tr><a href="innstilinger.php" class="navButtons">Innstillinger</a></tr>

        </nav>
    </header>
    <content>

        <a href="logout.php" id="loggout"><button >Logg ut</button></a>
    </content>
</body>
</html>