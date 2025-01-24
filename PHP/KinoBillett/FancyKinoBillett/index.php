<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kino Billetter</title>
        <style>
        table{
            text-align: left;
        }
        </style>
    </head>
    <body>
        <form method="POST" action="betalling.php">
            <label  type="text" for="billettVoksen">Hvor mange er voksene? (18+): </label>
            <input id="billettVoksen" name="billetterVoksen" type="number" min=0 value=0><br>
            <label  type="text" for="billettUngdom">Hvor mange er Ungdom (13-17): </label>
            <input id="billettUngdom" name="billetterUngdom" type="number" min=0 value=0><br>
            <label  type="text" for="billettBarn">Hvor mange er barn? (2-12): </label>
            <input id="billettBarn" name="billetterBarn" type="number" min=0 value=0><br>
            <label  type="text" for="billettSpedbarn">Hvor mange er under 1 år? (>1): </label>
            <input id="billettSpedbarn" name="billetterSpedbarn" type="number" min=0 value=0><br>
            <input type="submit" value="Submit">
        </form>
        <table >
            <tr>
                <th>Pris per voksen:</th>
                <td>150kr</td>
            </tr>
            <tr>
                <th>Pris per ungdom</th>
                <td>113kr</td>
            </tr>
            <tr>
                <th>Pris per Barn</th>
                <td>75kr</td>
            </tr>
            <tr>
                <th>Pris per spedbarn</th>
                <td>0kr</td>
            </tr>
        </table>
        
    </body>
</html>
