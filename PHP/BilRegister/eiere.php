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

    <title>Biler</title>
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
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bilregister";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT eierID, fornavn, etternavn, fodselsdato, telefon, eiere.CountryCode, countrycodes.phonecode, countrycodes.name FROM eiere LEFT JOIN countrycodes ON eiere.CountryCode = countrycodes.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'><tr><td>navn:</td><td>fødselsdato</td><td>telefon:</td><td>country:</td></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["fornavn"] . " ". $row["etternavn"] . "</td><td>" . $row["fodselsdato"] ."</td><td>+" . $row["phonecode"]. $row["telefon"] ."</td><td>" . $row["name"] ."</td></tr>";
                }
                echo "</table><br>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        <a href="leggTilEier.php"><button >Legg til Eier</button></a>
        <a href="logout.php" id="loggout"><button >Logg ut</button></a>
    </content>
</body>
</html>