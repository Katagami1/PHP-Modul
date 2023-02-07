<!DOCTYPE html>
<html lang="en">
<head>
    <title>Einen Beitrag erstellen</title>
</head>
<body>
<div style="font-family: Arial">
    <h2>Ihr Forumsbeitrag:</h2>
    <table class="beitrag">
        <tr>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <td>Kategoriename</td>
            <td><input type="text" name="kategorie"></td>
        </tr>
        <tr>
            <td>Betreffzeile</td>
            <td><input type="text" name="betreff"></td>
        </tr>
        <tr>
            <td>Ihr Eintrag</td>
            <td><textarea name="forumsbeitrag" cols="40" rows="5"></textarea></td>
        </tr>
    </table>

    <tr>
        <td><br><input type="submit" value="Abschicken"></td>
        <br><input type="reset" value="Loeschen">
    </tr>

    <?php
    session_start();
    $eingeloggt = false;
    $benutzername = $_COOKIE["benutzername"];
    $db = mysqli_connect("localhost", "root");
    mysqli_select_db($db, "forum");
    $kategorie ="";
    $betreff = "";
    $forumsbeitrag = "";
    if (($_COOKIE["eingeloggt"] == "true")) {
        $eingeloggt = true;
    }

    if (!empty($_POST["kategorie"]) && !empty($_POST["betreff"]) && (!empty($_POST["forumsbeitrag"]))) {
        $kategorie = $_POST["kategorie"];
        $betreff = $_POST["betreff"];
        $forumsbeitrag = $_POST["forumsbeitrag"];
        $abfrage = mysqli_query($db, "select Kategoriename from forum where Kategoriename ='$kategorie';");
        $abfrage_gefunden = mysqli_num_rows($abfrage);

        if ($abfrage_gefunden != 0) {
            print("<br>Kategoriename bereits vorhanden!"); #Benutzername bereits vergeben
        } else {
        $befehl = mysqli_query($db, "insert into forum (Kategoriename, user, betreff, beitragstext) 
    VALUES ('$kategorie', '$benutzername','$betreff', '$forumsbeitrag')");
            header("Location: index.php?success");
        #$befehl = mysqli_query($db, "UPDATE Benutzer SET Geschlecht = '$geschlecht' WHERE Benutzername = '$benutzername'");
    } }else {
        print("<br> <br> Bitte füllen Sie alle Felder aus!");
    }
    ?>
    <br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
    <?php if ($eingeloggt) {
        print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");
    } ?>
</div>
</body>
</html>
