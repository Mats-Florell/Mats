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



        $sql = "DELETE FROM `medlem` WHERE m_nr ='" . $m_nr . "' ";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully <script>
            window.location.href = 'medlemmer.php';
            </script>";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
}


$conn->close();
?>
</body>
</html>