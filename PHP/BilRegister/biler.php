<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

    if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] != true) {
        header('Location: index.php');
        exit;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bilregister.css">
</head>
<body>
    <header>
        <nav>

            <trclass="navButtons"><a href="biler.php" class="navButtons">Biler</a></tr>
            <tr><a href="kunder.php" class="navButtons">Kunder</a></tr>
            <tr><a href="./" class="navButtons">Senere</a></tr>
            <tr><a href="innstilinger.php" class="navButtons">Innstillinger</a></tr>

        </nav>
    </header>
    <content>

        <a href="logout.php" id="loggout"><button >Logg ut</button></a>
    </content>
</body>
</html>