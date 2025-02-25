<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyre-Liste</title>
</head>
    <body>
        <nav>
            <a href="index.php">Dyre-Liste</a>
            <br>
            <a href="addDyr.php">Legg til Kjeledyr</a>
        </nav>

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
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["ID"]. " - Navn: " . $row["Navn"]. ".  Fødselsdato: " . $row["Fodselsdato"]. ".  Dyre-Type: " . $row["dyreType"].".  Rase: " . $row["Rase"]."<br>";
  }
} else {
  echo "ingen dyr ennå";
}
$conn->close();
?>
    
    </body>
</html>