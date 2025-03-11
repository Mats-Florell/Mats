<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyre-Liste: Fjern dyr</title>
    <link rel="stylesheet" href="dyreregister.css">
</head>
<body>
    <nav>
          <a href="index.php" class="navButtons">Dyre-Liste</a>
          <a href="fjernDyr.php" class="navButtons">Fjern kjeledyr</a>
          <a href="addDyr.php" class="navButtons">Legg til Kjeledyr</a>
    </nav>
    <content>
    <form action="fjernDyr.php" method="POST">
        <table class="formTable">
            <tr>
                <td>Dyret: </td>
                <td>
                
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
                
                    $sql = "SELECT ID, Navn, Fodselsdato FROM Kjeledyr";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<select name='kjeledyrID'>";
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["ID"] . "'>" . $row["Navn"] . " født: " . $row["Fodselsdato"] . "</option>";
                        }
                        echo "</select>";
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
        
            </td>
        </tr>  
        </table>

        <input type="submit"></input>
    </form>
    </content>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $sql = "DELETE FROM Kjeledyr WHERE ID='" . $_POST["kjeledyrID"] . "';";
        $result = $conn->query($sql);
    }
    ?>
</body>