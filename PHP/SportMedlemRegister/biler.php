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
            
            $sql = "SELECT regNr, Merke, Farge, bilType, biler.eierID, eiere.fornavn, eiere.etternavn, biler.bilID FROM biler JOIN eiere ON eiere.eierID = biler.eierID;";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<table class='table'><tr><td>Reg-Nummer: </td><td>Merke:</td><td>Farge:</td><td>bil type:</td><td>Eier-Navn:</td><td>Rediger:</td><td>Slett:</td></tr>";
                $eiere = array();
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["regNr"] . "</td><td>" . $row["Merke"] . "</td><td> ". $row["Farge"] . "</td><td>" . $row["bilType"] ."</td><td>" . $row["fornavn"] . " " . $row["etternavn"] . "</td><form action='endreBil.php' method='POST'><td><button name='bilID' type='submit' value='" . $row["bilID"] . "'>Rediger</button></td>    </form><td><form action='slettBil.php' method='POST'><button name='bilID' type='submit' value='" . $row["bilID"] . "'>Slett</button></form></td><tr>";
                }
    
                echo "</table><br>";
            }
            $conn->close();
            ?>
        <a href="leggTilBil.php"><button >Legg til biler</button></a>
        <a href="logout.php" id="loggout"><button>Logg ut</button></a>
    </content>
</body>
</html>