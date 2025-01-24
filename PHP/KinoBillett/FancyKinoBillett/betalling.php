<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Logined</title>
    </head>
    <body>

        <?php  
            $billetPris = 150;

            $billetterVoksen = $_POST["billetterVoksen"]; //Henter antall voksen billetter
            $billetterPrisVoksen= $billetterVoksen *$billetPris;
            
            $billetterUngdom = $_POST["billetterUngdom"]; //Henter antall ungdoms billetter
            $billetPrisUngdom =$billetterUngdom * $billetPris*0.75;

            $billetterBarn = $_POST["billetterBarn"]; //Henter antall barne billetter      
            $billetPrisBarn = $billetterBarn *  $billetPris * 0.5;

            $billetterSpedbarn = $_POST["billetterSpedbarn"]; //Henter antall barne billetter

            $billettPrisTotal = $billetPrisBarn + $billetPrisUngdom + $billetterPrisVoksen;
            $billetterTotal= $billetterVoksen + $billetterUngdom + $billetterBarn+ $billetterSpedbarn;
            $billettPrisTotal= ceil($billettPrisTotal);
            echo "du trenger " . $billetterVoksen . " voksen billetter til " . $billetterPrisVoksen . "kr <br>";
            echo "du trenger " . $billetterUngdom . " ungdoms billetter til " . $billetPrisUngdom . "kr <br>";
            echo "du trenger " . $billetterBarn . " barne billetter til " .$billetPrisBarn . "kr <br>";
            echo "du trenger " . $billetterSpedbarn . " spedbarns billetter <br>";
            echo "det vil koste " . $billettPrisTotal. "kr ";
            ?>
    </body>
</html>
