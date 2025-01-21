<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kino Billetter</title>
    </head>
    <body>
        <form method="POST" action="betalling.php">
            <label  type="text" for="billettVoksen">Hvor mange er voksene? (18+): </label>
            <input id="billettVoksen" name="billetterVoksen" type="number"><br>
            <label  type="text" for="billettUngdom">Hvor mange er Ungdom (13-17): </label>
            <input id="billettUngdom" name="billetterUngdom" type="number"><br>
            <label  type="text" for="billettBarn">Hvor mange er barn? (2-12): </label>
            <input id="billettBarn" name="billetterBarn" type="number"><br>
            <label  type="text" for="billettSpedbarn">Hvor mange er under 1 år? (>1): </label>
            <input id="billettSpedbarn" name="billetterSpedbarn" type="number"><br>
            <input type="submit" value="Submit">
        </form>

        
    </body>
</html>
