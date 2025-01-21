<html>
<body>

<?php 
    $cups = array($_POST["cupOne"],$_POST["cupTwo"],$_POST["cupThree"]);
    $newCups = array();
    $cupCount=count($cups);
    echo "Before swapping:<br>";
    for ($x = 0; $x < $cupCount; $x++){
        if ($x ==$cupCount-1){
            $newcups[$x] = $cups[0];
        }
        else{
            $newcups[$x] = $cups[$x+1];
        }
        
        $x1 = $x+1;
        echo "Cup $x1 Contains: $cups[$x] <br>";
    }
    $newCupCount=count($newcups);
    echo "<br> After swapping: <br>";
    for ($x = 0; $x < $newCupCount; $x++){
        $x1 = $x+1;
        echo "Cup $x1 Contains: $newcups[$x] <br>";
    }
?>
</body>
</html>