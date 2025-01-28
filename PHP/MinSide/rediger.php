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
    <form action="profil.php" method="POST">
    <table>
    <tr>
        <td>Navn: </td>
        <td><input type="text" name="navn" required minlength="2" value="<?php if(isset($_SESSION["navn"])){echo $_SESSION["navn"];}?>"></td>
    </tr>
    <tr>
    <td> Alder: </td>
    <td><input type="number" name="alder" required min="1" max="120" value="<?php if(isset($_SESSION["alder"])){echo $_SESSION["alder"];}?>"></td>
    </tr>
    <tr>
        <td>Epost: </td>
        <td>
            <input type="text" name="epost" required value="<?php if(isset($_SESSION["epost"])){echo $_SESSION["epost"];}?>"></td>
    </tr>
   
    </table>
    <input type="submit">   
</form>

</body>
</html>