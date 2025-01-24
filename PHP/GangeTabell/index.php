<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
    <label for="factor">faktor:</label>
    <input type="number" name="factor" id="factor" require min=1 max=10><br>
    <input type="submit">
    </form>
    <?php 
        if(isset($_GET["factor"])){
            $Factor = $_GET["factor"];
            echo "her ser du " . $Factor . " gangen <br>";
            for($i = 1; $i <=10; $i++){
                echo $Factor*$i . "<br>";
            }
        }        
    
    ?>
</body>
</html>