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
            $billetterUngdom = $_POST["billetterUngdom"]; //Henter antall ungdoms billetter
            $billetterBarn = $_POST["billetterBarn"]; //Henter antall barne billetter
            $billetterSpedbarn = $_POST["billetterSpedbarn"]; //Henter antall barne billetter
            $billetPrisBarn = $billetterBarn *  $billetPris * 0.5;
            $billetPrisUngdom  = $billetterUngdom *  $billetPris*0.75;
            $billetterPrisVoksen= $billetterVoksen *$billetPris;
            $billettPrisTotal = $billetPrisBarn + $billetPrisUngdom + $billetterPrisVoksen;
            $billetterTotal= $billetterVoksen + $billetterUngdom + $billetterBarn+ $billetterSpedbarn;
            $billettPrisTotal= ceil($billettPrisTotal);
            echo "du trenger " . $billetterTotal . " billetter <br>";
            echo "det vil koste " . $billettPrisTotal. "kr ";
            ?>
    </body>
</html>
