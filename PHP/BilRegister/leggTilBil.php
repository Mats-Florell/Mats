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

    <title>Legg til bil</title>
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
    <form action="leggTilBil.php" method="POST">
        <table class="formTable">
        <tr>
            <td>Reg-Nummer:</td>
            <td><input type="text" name="RegNr" maxLength="7"></td>
        </tr>
        <tr>
            <td>Merke:</td>
            <td><input type="text" name="Merke" maxLength="10"></td>
        </tr>
        <tr>
            <td>Farge:</td>
            <td><input type="text" name="Farge"maxLength="12"></td>
        </tr>
        <tr>
            <td>Bil-Type:</td>
            <td><input type="text" name="BilType" maxLength="16"></td>
        </tr>  
        <tr>
            <td>Eier: </td>
            <td>
            <select name='BilEierID'>
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

            $sql = "SELECT eierID, fornavn, etternavn, fodselsdato FROM eiere";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["eierID"] . "'>" . $row["fornavn"] . " ". $row["etternavn"]. "</option>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        </select>
            </td>
        </tr>  
        </table>
        <input type="submit"></input>
    </form>
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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST["RegNr"]) or strlen($_POST["RegNr"])>10){
        echo "error: Må skrive gyldig RegNr";
    }elseif(empty($_POST["Merke"])or strlen($_POST["Merke"])>12){
        echo "error: Må skrive gyldig merke";
    }elseif(empty($_POST["Farge"]) or strlen($_POST["Farge"])>10){
        echo "error: Må skrive gyldig gyldig";
    }elseif(empty($_POST["BilType"]) or strlen($_POST["BilType"])>16){
        echo "error: Må skrive gyldig biltype";
    }elseif(empty($_POST["BilEierID"]) or strlen($_POST["BilEierID"])>11){
        echo "error: eierIDer ugyldig";
    }else{
        $RegNr = $_POST["RegNr"];
        $Merke = $_POST["Merke"];
        $Farge = $_POST["Farge"];
        $BilType = $_POST["BilType"];
        $BilEierID = $_POST["BilEierID"];


        $sql = "INSERT INTO biler (regNr, Merke, Farge, bilType, eierID) VALUES ('" . $RegNr . "', '" . $Merke . "', '" . $Farge  . "', '" . $BilType . "', '" . $BilEierID . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>
</body>
</html>