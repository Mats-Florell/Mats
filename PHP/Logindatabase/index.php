<!DOCTYPE html>
<html lang="en">
<?php
    session_start();

    if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) {
        echo "<p>Du er nå logget inn.</p>";
    } else {
        echo "<p>Du er ikke logget inn.</p>";        
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form method="post">
        <label for="brukernavn">Brukernavn:</label>
        <input type="text" id="brukernavn" name="brukernavn" required><br>
    
        <label for="passord">Passord:</label>
        <input type="password" id="passord" name="passord" required><br>

        <button type="submit">Logg inn</button>
    </form>

    <form method="post">
        <button type="submit" name="loggut">Logg ut</button>
    </form>
<?php
    $server = "localhost";
    $database = "inloggingtest";
    $dbUser = "root";
    $dbPassword = "";

    try {
       $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $dbUser, $dbPassword);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Kunne ikke koble til databasen: " . $e->getMessage());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $innsendtNavn = $_POST['brukernavn'];
        $innsendtPassord = $_POST['passord'];

        $sql = "SELECT brukernavn, passord FROM brukere ";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["brukernavn"]. " <br>";

        }
        if (false) {
            $_SESSION['innlogging'] = true;
            header('Location: index.php');
            exit;
        } else {
            echo "<p>Feil brukernavn eller passord!</p>";
        }
    }
    ?>
</body>
</html>