<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyre-Liste</title>
    <link rel="stylesheet" href="dyreregister.css">
</head>
    <body>
        <nav>
          <a href="index.php" class="navButtons">Dyre-Liste</a>
          <a href="fjernDyr.php" class="navButtons">Fjern Kjeledyr</a>
          <a href="addDyr.php" class="navButtons">Legg til Kjeledyr</a>
        </nav>
<content>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dyrregister";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, Navn, Fodselsdato, dyreType ,Rase FROM Kjeledyr";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table> <tr class='header'><td>Navn:</td><td>Fødselsdato:</td><td>Dyre type:</td><td>Rase:</td></tr>";
  $DeleteID = array();
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr> <td>" . $row["Navn"] . "</td><td>" . $row["Fodselsdato"]. "</td><td>" . $row["dyreType"]."</td><td>" . $row["Rase"] ."</td></tr>";
    
    array_push($DeleteID, $row["ID"]);
  }
  echo "</table>";
} else {
  echo "ingen dyr ennå";
}

$conn->close();
?>
</content>
    </body>
</html>