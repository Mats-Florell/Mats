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

    <title>Medlemmer</title>
    <link rel="stylesheet" href="bilregister.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"  />
</head>
<body>
    <header>
        <nav>
            <tr><a href="medlemmer.php" class="navButtons">Medlemmer</a></tr>
            <tr><a href="./" class="navButtons">Senere</a></tr>
            <tr><a href="innstilinger.php" class="navButtons">Innstillinger</a></tr>

        </nav>
    </header>
    <content>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sport";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM medlem LEFT JOIN norske_postnummer ON medlem.postNr = norske_postnummer.postnummer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'><tr><td>Navn:</td><td>Fødselsdato</td><td>Telefon:</td><td>Post Nummer:</td><td>Post Sted:</td><td>Betalt kontingent:</td><td>Rediger:</td><td>Slett:</td></tr>";

                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["betalt"]==1){
                        $betalt ="Ja";
                    }
                    if($row["betalt"]==0){
                        $betalt ="Nei";
                    }
                    echo "<tr><td>" . $row["fornavn"] . " ". $row["etternavn"] . "</td><td>" . $row["fodt"] ."</td><td>" . $row["telefon"] ."</td><td>" . $row["postnr"] ."</td><td>" . $row["poststed"] ."</td><td>" . $betalt ."</td><form action='endreMedlem.php' method='POST'><td><button name='m_nr' type='submit' value='" . $row["m_nr"] . "'>Rediger</button></td></form><td><form action='slettMedlem.php' method='POST'><button name='m_nr' type='submit' value='" . $row["m_nr"] . "'>Slett</button></form></td></tr>";
                }
                echo "</table><br>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        <a href="leggTilMedlem.php"><button >Legg til medlem</button></a>
        <a href="logout.php" id="loggout"><button >Logg ut</button></a>

    </content>
</body>
</html>