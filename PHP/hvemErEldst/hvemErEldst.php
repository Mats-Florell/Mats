<html>
    <body>
        <?php 
            $bruker1 = $_POST["alder1"]; //Hent bruker 1 sin alder
            $bruker2 =  $_POST["alder2"]; //Hent bruker 2 sin alder

            if ( (int) $bruker1 < (int) $bruker2) { //hvis bruker 2 er eldre
                echo "Bruker 2 er eldre"; // skriv ut bruker 2 er eldre til siden
            } elseif ((int) $bruker1 > (int) $bruker2){ //hvis bruker 1 er eldre
                echo "Bruker 1 er eldre";// skriv ut bruker 1 er eldre til siden
            } else { //hvis de er like gamle
                echo "dere er like gamle"; //skriv ut at de er like gamle til side
            }
        ?>
        <br>
    </body>
</html>
