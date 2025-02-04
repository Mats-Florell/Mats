<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logget inne</title>
</head>
<body>
    <?php
        session_start();
        $server = "localhost";
        $dbname = "inloggingtest";
        $dbUser = "root";
        $dbPassword = "";
    
        // Create connection
        $conn = new mysqli($server, $dbUser, $dbPassword, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT brukernavn FROM brukere WHERE id='" . "'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["brukernavn"]. " <br>";

        }
            
        $conn->close();
        if (isset($_SESSION['innlogging']) && $_SESSION['innlogging'] === true) {
            echo "<p>Du er nå logget inn.</p>";
        } else {
            echo "<p>Du er ikke logget inn.</p>";        
        }
    ?>
</body>
</html>