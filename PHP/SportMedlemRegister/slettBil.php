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
        $bilID = $_POST["bilID"];
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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){



        $sql = "DELETE FROM `biler` WHERE`bilID` ='" . $bilID . "'; ";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully "

        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
}


$conn->close();
?>
</body>
</html>