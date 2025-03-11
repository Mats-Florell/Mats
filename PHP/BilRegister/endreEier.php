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
        $eierID = $_POST["eierID"];
?>
<head>

    <title>Endre Eier Info</title>
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
    <form action="endreEier.php" method="POST">
        <table class="formTable">
        <tr>
            <td>Fornavn:</td>
            <td><input type="text" name="fornavn" maxLength="16" value="<?php $sql = "SELECT fornavn FROM eiere where eierID=" .$eierID . " ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["fornavn"];
            ?>"></td>
        </tr>
        <tr>
            <td>Etternavn:</td>
            <td><input type="text" name="etternavn" maxLength="20" value="<?php $sql = "SELECT etternavn FROM eiere where eierID='" .$eierID . "'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["etternavn"];
            ?>"></td>
        </tr>
        <tr>
            <td>Fødselsdato:</td>
            <td><input type="date" name="fodselsdato" value="<?php $sql = "SELECT fodselsdato FROM eiere where eierID=" .$eierID . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["fodselsdato"];
            ?>"></td>
        </tr>
        <tr>
            <td>Kontakt telefon:</td>
            <td><input type="text" name="telefon" maxLength=8 value="<?php $sql = "SELECT telefon FROM eiere where eierID=" .$eierID . " ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["telefon"];
            ?>"></td>
        </tr>  
        <tr>
            <td>Land Kode (tlf): </td>
            <td>
            <select name='landKode'>
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

            $sql = "SELECT id, name, phonecode FROM countrycodes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["name"] . ": " . $row["phonecode"] . "</option>";
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
        <input type="Hidden" name="eierID" value=" <?php echo $eierID; ?>"></input>
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
    if(empty($_POST["fornavn"]) or strlen($_POST["fornavn"])>16){
        echo "error: Må skrive gyldig fornavn";
    }elseif(empty($_POST["etternavn"])or strlen($_POST["etternavn"])>20){
        echo "error: Må skrive gyldig etternavn";
    }elseif(empty($_POST["fodselsdato"]) or $_POST["fodselsdato"]> date('Y-m-d',strtotime("-18 Years")) or $_POST["fodselsdato"] < date('Y-m-d',strtotime("-110 Years"))){
        echo "error: Må skrive gyldig fodselsdato";
    }elseif(empty($_POST["telefon"]) or strlen($_POST["telefon"])<8 or strlen($_POST["telefon"])>8 or preg_match('~[0-9]+~',$_POST["telefon"]) != true){
        echo "error: Må skrive korrekt telefonnummer";
    }elseif(empty($_POST["landKode"])){
            echo "error: Må skrive korrekt landskode";
    }else{

        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $fodselsdato = $_POST["fodselsdato"];
        $telefon = $_POST["telefon"];
        $landkode = $_POST["landKode"];

        $sql = "UPDATE `eiere` SET `fornavn` = '" . $fornavn . "' ,`fodselsdato` = '" . $fodselsdato . "' , `telefon`= '" .  $telefon  . "', `CountryCode`='". $landkode. "' WHERE `eierID` ='" . $eierID . "'; ";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully <script>
            window.location.href = 'eiere.php';
            </script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
$conn->close();
?>
</body>
</html>