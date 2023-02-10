<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    $eingeloggt = false;
    $vorname = "";
    $nachname = "";
    $benutzername = $_COOKIE["benutzername"];
    $geschlecht = "";
    $alter = 0;
    $gewicht = 0;
    $groesse = 0;
    $kategoriename = "";
    $kategeoriearray = "";

    $db = mysqli_connect("localhost", "root");
    mysqli_select_db($db, "forum");

    if(($_COOKIE["eingeloggt"] == "true")) {
        $eingeloggt = true;
    }

    if (isset($_GET["beitrags_id"]) && $_GET['beitrags_id'] != ""){
        $id=$_GET['beitrags_id'];
    } else {
        print("<h1> Keine ID gefunden.</h1>");
    }

    $anfrage = mysqli_query($db, "SELECT * FROM forum where beitrags_id = '$id';");
    foreach($anfrage as $key => $value) {
        $beitragsIdArray = $value["beitrags_id"];
        $kategorieNameArray = $value["Kategoriename"];
        $bezugsIdArray= $value["bezugs_id"];
        $usernameArary = $value["user"];
        $betreffArray = $value["betreff"];
        $beitragsTextArray = $value["beitragstext"];
    }


    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>PHP-Forumsbeitrag - Antwort</title></head>
<body>
<div style="font-family:arial">
    <h2>Ihre Antwort auf den Forumsbeitrag mit der ID:<?php echo $beitragsIdArray ?></h2>
    <form method="post" action="reply_entry.php?cid=<?php echo $kategorieNameArray?>&topicid=<?php echo $betreffArray?>">
        <table border="0">
                <td>Betreff-Zeile</td>
                <td>
                    <?php
                        $betreff="<input type='text' name='betreff' value='";
                        $betreff.="Re: " . $betreffArray;
                        $betreff.="'>";
                        print ($betreff);
                        print ("<input type='hidden' name='forums_id' value='");
                        print ($id);
                        print ("'>");
                    ?>

                </td></tr>
            <tr><td>Ihr Eintrag</td>
                <td><textarea name="forumsbeitrag" id="forumsbeitrag" cols="40" rows="5"></textarea></td></tr>
            <tr>
                <td><input type="submit" value="Abschicken">
                    <input type="reset" value="Löschen"></td></tr>
        </table>
        <br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
        <?php if ($eingeloggt) {
            print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");
        } ?>
    </form></div>
</body></html>
