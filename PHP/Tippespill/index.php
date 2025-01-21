<!DOCTYPE html>
<?php
// Start the session
session_start();
if(isset($_SESSION["rightnumber"])){
    
}else{
    $_SESSION["rightnumber"]=rand(0,10);
    $_SESSION["Attempts"]=1;
}
?>    
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TippeSpill</title>
    </head>
    <body>
        <h1>TippeSpill</h1>
        <form method="GET">
        <label  type="text" for="tallTipping">Tippetall: </label>
        <input type="Number" id="tallTipping" name="tippetall" min="0" max="10"  required><br>
        <input type="submit" value="Submit">
        </form>
        <?php
            if(isset($_GET["tippetall"])){
                $tipping = $_GET["tippetall"];  
                if($tipping == $_SESSION["rightnumber"]){
                    echo "helt riktig! tallet var: " . $_SESSION["rightnumber"] . "<br>";
                    echo "du gjettet riktig på " . $_SESSION["Attempts"] . " forsøk!";
                    session_unset();
               }else{
                    echo "helt feil! du gjettet: " . $tipping . "<br>";
                    $_SESSION["Attempts"]+=1;
                }  
         };
        ?>

        
    </body>
</html>

