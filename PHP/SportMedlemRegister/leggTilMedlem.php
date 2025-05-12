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

    <title>Legg Medlem</title>
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
    <form action="leggTilMedlem.php" method="POST">
        <table class="formTable">
        <tr>
            <td>Fornavn:</td>
            <td><input type="text" name="fornavn" maxLength="30"></td>
        </tr>
        <tr>
            <td>Etternavn:</td>
            <td><input type="text" name="etternavn" maxLength="50"></td>
        </tr>
        <tr>
            <td>Adresse:</td>
            <td><input type="text" name="adresse" maxLength="70"></td>
        </tr>
        <tr>
            <td>PostNr:</td>
            <td><select name='postNr'>
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

            $sql = "SELECT postnummer, poststed FROM norske_postnummer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["postnummer"] . "'>" .$row["poststed"] . ": " . $row["postnummer"] . "</option>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
        </select>
        </td>
        </tr>

        <tr>
            <td>Fødselsdato:</td>
            <td><input type="date" name="fodt"></td>
        </tr>
        <tr>
            <td>Epost:</td>
            <td><input type="text" name="mail" maxLength="100"></td>
        </tr>
        <tr>
            <td>Kontakt telefon:</td>
            <td><input type="text" name="telefon" maxLength="12"></td>
        </tr>  
        <tr>
            <td>Betalt kontingent:</td>
            <td><input type="checkbox" name="betalt"></td>
        </tr>
        <input type="submit"></input>
        </table>
        
    </form>

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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST["fornavn"]) or strlen($_POST["fornavn"])>30){
        echo "error: Må skrive gyldig fornavn";
    }elseif(empty($_POST["etternavn"])or strlen($_POST["etternavn"])>50){
        echo "error: Må skrive gyldig etternavn";
    }elseif(empty($_POST["adresse"])or strlen($_POST["adresse"])>70){
        echo "error: Må skrive gyldig adresse";
    }elseif(empty($_POST["postNr"])or strlen($_POST["postNr"])>4){
        echo "error: Må skrive gyldig postNummer";
    }elseif(empty($_POST["postSted"])or strlen($_POST["postSted"])>100){
        echo "error: Må skrive gyldig postSted";
    }elseif(empty($_POST["mail"])or strlen($_POST["mail"])>100){
        echo "error: Må skrive gyldig postNummer";
    }elseif(empty($_POST["fodt"]) or $_POST["fodt"]> date('Y-m-d',strtotime("-10 Years")) or $_POST["fodt"] < date('Y-m-d',strtotime("-110 Years"))){
        echo "error: Må skrive en gyldig epost";
    }elseif(empty($_POST["telefon"]) or strlen($_POST["telefon"])<8 or strlen($_POST["telefon"])>8 or preg_match('~[0-9]+~',$_POST["telefon"]) != true){
        echo "error: Må skrive korrekt telefonnummer";
    }else{
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $fodselsdato = $_POST["fodt"];
        $telefon = $_POST["telefon"];
        $adresse = $_POST["adresse"];
        $postNr = $_POST["postNr"];
        $mail = $_POST["mail"];
        $betalt = $_POST["betalt"];

        $sql = "INSERT INTO medlem (fornavn, etternavn, fodt, telefon, adresse, postnr, mail, betalt) VALUES ('" . $fornavn . "', '" . $etternavn . "', '" . $fodselsdato  . "', '" . $telefon . "', '" . $adresse . "','" . $postNr . "','" . $postSted . "','" . $mail . "','" . $betalt . "')";

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