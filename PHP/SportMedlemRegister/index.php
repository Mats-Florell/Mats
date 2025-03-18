<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">

    <title>Login</title>
    <link rel="stylesheet" href="bilregister.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"  />
</head>
<body>
    <header>
        <nav>

           <tr class="navButtons"><a href="biler.php" class="navButtons">Biler</a></tr>
            <tr><a href="medlemmer.php" class="navButtons">Medlemmer</a></tr>
            <tr><a href="./" class="navButtons">Senere</a></tr>
            <tr><a href="innstilinger.php" class="navButtons">Innstillinger</a></tr>

        </nav>
    </header>
    <content>
    <form method="post">
        <table class="formTable">
        <tr>
            <td>
                <label for="brukernavn">Brukernavn:</label>
            </td>
            <td>
                <input type="text" id="brukernavn" name="brukernavn" required><br>
            </td>
        </tr>
        <tr>
            <td>
                <label for="passord">Passord:</label>
            </td>
            <td>
                <input type="password" id="passord" name="passord" required><br>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit">Logg inn</button>
            </td>
            <td>
                <a href="logout.php" id="loggout"><button >Logg ut</button></a>
            </td>
        </tr>
    </form>

    
    <?php
        $server = "localhost";
        $database = "sport";
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

                $sql = "SELECT brukernavn, passord FROM bruker";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                if($row["brukernavn"] === $innsendtNavn and $innsendtPassord === $row["passord"]){
                    $_SESSION['innlogging'] = 1;
                }

                if ($_SESSION['innlogging'] == 1) {
                    header('Location: medlemmer.php');
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