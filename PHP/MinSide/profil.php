<!DOCTYPE html>
<html lang="en">
<?php
    // Start the session
    session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="index.php">Velkommen</a>
        <a href="./">Annen side 2</a>
        <a href="./">Annen side 3</a>
        <a href="./">Annen side 4</a>
        <a href="profil.php">Profil</a>
    </nav>
    <a href="rediger.php">Rediger profil</a><br>
    <?php
    
        if(Isset($_POST["navn"])){
            
            
            if(strlen($_POST["navn"]) > 1){
                $_SESSION["navn"] = $_POST["navn"];
                echo "Navn: " .  $_SESSION["navn"] . "<br>";
            }else{
                echo "Error: Invalid Name<br>";
            }
        }else {
            if(Isset($_SESSION["navn"])){
            echo "Navn: " .  $_SESSION["navn"] . "<br>";
            }else{
                header('Location: rediger.php');
                exit;
            }
        }
        if(Isset($_POST["epost"])){
            
            $AmountOfAtSymbols=substr_count($_POST["epost"], "@");
            
            if($AmountOfAtSymbols == 1){
            
                $_SESSION["epost"] = $_POST["epost"];
                echo "Epost: " .  $_SESSION["epost"] . "<br>";  
            }else{
                echo "Error: Invalid Email<br>";
            }
        }else {
            if(Isset($_SESSION["epost"])){
                echo "Epost: " .  $_SESSION["epost"] . "<br>";  
            }else{
                header('Location: rediger.php');
                exit;
            }
        }
        if(Isset($_POST["alder"])){
           
            if($_POST["alder"] > 1 && $_POST["alder"] < 120){
                $_SESSION["alder"] = $_POST["alder"];
                echo "Alder: " . $_SESSION["alder"] . "<br>";
                if($_SESSION["alder"] < 18){
                    echo "Du er ikke myndig<br>";
                }else{
                    echo "Du er myndig du oldefar<br>";
                }
            }else{
                echo "Error: Invalid Age<br>";
            }
        
        }else {
            if(Isset($_SESSION["alder"])){
            echo "Alder: " . $_SESSION["alder"] . "<br>";
            if($_SESSION["alder"] < 18){
                echo "Du er ikke myndig<br>";
            }else{
                echo "Du er myndig du oldefar<br>";
            }
            }else{
                header('Location: rediger.php');
                exit;
            }
        }

    ?>
    <form action="index.php" method="post">
        <input type="submit" value="logout" name="logout"></input>
    </form>

</body>
</html>