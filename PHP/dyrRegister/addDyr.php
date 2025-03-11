<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyre-Liste: Legg til dyr</title>
    <link rel="stylesheet" href="dyreregister.css">'
</head>
<body>
    <nav>
          <a href="index.php" class="navButtons">Dyre-Liste</a>
          <a href="fjernDyr.php" class="navButtons">Fjern kjeledyr</a>
          <a href="addDyr.php" class="navButtons">Legg til Kjeledyr</a>
    </nav>
    <content>
    <form action="addDyr.php" method="POST">
        <table class="formTable">
        <tr>
            <td>Navn</td>
            <td><input type="text" name="dyreNavn"></td>
        </tr>
        <tr>
            <td>Fødselsdato</td>
            <td><input type="date" name="dyreDato"></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type="text" name="dyreType"></td>
        </tr>  
        <tr>
            <td>Rase</td>
            <td><input type="text" name="dyreRase"></td>
        </tr>
        </table>
        <input type="submit"></input>
    </form>
</content>
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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$dyreDato = $_POST["dyreDato"];
$dyreType = $_POST["dyreType"];
$dyreRase = $_POST["dyreRase"];
$dyreNavn = $_POST["dyreNavn"];



    $sql = "INSERT INTO Kjeledyr (dyreType, Navn, Fodselsdato, Rase)
        VALUES ('" . $dyreType . "', '" . $dyreNavn . "', '" . $dyreDato  . "', '" . $dyreRase . "')";

    if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
</body>
</html>