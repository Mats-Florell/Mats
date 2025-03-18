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
        $dbname = "sport";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection            
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $m_nr = $_POST["m_nr"];
?>
<head>

    <title>Endre Eier Info</title>
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
<form action="endreMedlem.php" method="POST">
        <table class="formTable">
        <tr>
            <td>Fornavn:</td>
            <td><input type="text" name="fornavn" value="<?php $sql = "SELECT fornavn FROM `medlem` where m_nr=" .$m_nr . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["fornavn"];
            ?>"></input></td>
        </tr>
        <tr>
            <td>Etternavn:</td>
            <td><input type="text" name="etternavn" maxLength="50" value="<?php $sql = "SELECT etternavn FROM `medlem` where m_nr=" .$m_nr . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["etternavn"];
            ?>"></td>
        </tr>
        <tr>
            <td>Adresse:</td>
            <td><input type="text" name="adresse" maxLength="70" value="<?php $sql = "SELECT adresse FROM `medlem` where m_nr=" .$m_nr . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["adresse"];
            ?>"></td>
        </tr>

        <tr>
            <td>Fødselsdato:</td>
            <td><input type="date" name="fodt" value="<?php $sql = "SELECT fodt FROM `medlem` where m_nr=" .$m_nr . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["fodt"];
            ?>"></td>
        </tr>
        <tr>
            <td>Epost:</td>
            <td><input type="text" name="mail" maxLength="100"value="<?php $sql = "SELECT mail FROM `medlem` where m_nr=" .$m_nr . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["mail"];
            ?>"></td>
        </tr>
        <tr>
            <td>Kontakt telefon:</td>
            <td><input type="text" name="telefon" maxLength=12 value="<?php $sql = "SELECT telefon FROM `medlem` where m_nr=" .$m_nr . "";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row["telefon"];
            ?>"></td>
        </tr>  
        <tr>
            <td>Betalt kontingent:</td>
            <td><input type="checkbox" name="betalt" value="1"></td>
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
        <input type="Hidden" name="m_nr" value=" <?php echo $m_nr; ?>"></input>
        
    </table>
    <input type="submit"></input>
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
    }elseif(empty($_POST["mail"])or strlen($_POST["mail"])>100){
        echo "error: Må skrive gyldig postNummer";
    }elseif(empty($_POST["fodt"]) or $_POST["fodt"]> date('Y-m-d',strtotime("-10 Years")) or $_POST["fodt"] < date('Y-m-d',strtotime("-110 Years"))){
        echo "error: Må skrive en gyldig epost";
    }elseif(empty($_POST["telefon"]) or strlen($_POST["telefon"])<8 or strlen($_POST["telefon"])>8 or preg_match('~[0-9]+~',$_POST["telefon"]) != true){
        echo "error: Må skrive korrekt telefonnummer";
    }else{
        if(empty($_POST["betalt"])){
            $betalt=0;
        }else{
            $betalt = $_POST["betalt"];
        }
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $fodselsdato = $_POST["fodt"];
        $telefon = $_POST["telefon"];
        $adresse = $_POST["adresse"];
        $postNr = $_POST["postNr"];
        $mail = $_POST["mail"];

        
        $sql = "UPDATE `medlem` SET `fornavn` = '" . $fornavn . "' ,`etternavn` = '" . $etternavn . "' ,`fodt` = '" . $fodselsdato . "' , `telefon`= '" .  $telefon  . "', `adresse`='". $adresse. "', `postnr` = '" . $postNr . "' , `mail` = '" . $mail . "' , `betalt` = '" . $betalt . "' WHERE `m_nr` ='" . $m_nr . "'; ";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<script>
            window.location.href = 'medlemmer.php';
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