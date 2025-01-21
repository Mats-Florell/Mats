<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $myfile=fopen("questions.txt", "r");
    $Counter=0;
    $question = arrary()
    while(!feof($myfile)) {

        if ($Counter%2==1){
            echo "$Counter <br>";
            $question[$Counter] fgets($myfile) . "<br>";
            



        }else
        {
            echo "$Counter <br>";
            $svar[$Counter] = fgets($myfile). "<br>";
        }

    $Counter+=1;
    }
    fclose($myfile);
    ?>
</body>
</html>
