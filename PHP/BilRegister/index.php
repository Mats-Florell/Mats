<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
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
    <form method="post">
        <label for="brukernavn">Brukernavn:</label>
        <input type="text" id="brukernavn" name="brukernavn" required><br>
    
        <label for="passord">Passord:</label>
        <input type="password" id="passord" name="passord" required><br>

        <button type="submit">Logg inn</button>
        <a href="logout.php" id="loggout"><button >Logg ut</button></a>
    </form>

    
    <?php
        $server = "localhost";
        $database = "bilregister";
        $dbUser = "root";
        $dbPassword = "";

        try {
       $conn = mysqli_connect($server, $dbUser, $dbPassword, $database);
        } catch (PDOException $e) {
            die("Kunne ikke koble til databasen: " . $e->getMessage());
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if($loggut == null){
                $innsendtNavn = $_POST['brukernavn'];
                $innsendtPassord = $_POST['passord'];

                $sql = "SELECT brukernavn, passord FROM brukere";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                if($row["brukernavn"] === $innsendtNavn and $innsendtPassord === $row["passord"]){
                    $_SESSION['innlogging'] = true;
                }

                if ($_SESSION['innlogging'] == true) {
                    header('Location: biler.php');
                   exit;
               } else {
                    echo "<p>Feil brukernavn eller passord!</p>";
                   header('Location: index.php');
                   exit;
                }
            }
        }
        ?>
    </content>
</body>
</html>