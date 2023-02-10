<?php
    session_start();
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
    $topic = "";

    $db=mysqli_connect("localhost","root");
    mysqli_select_db($db, "forum");

    if(($_COOKIE["eingeloggt"] == "true")) {
    $eingeloggt = true;
    }

if(isset($_GET["cid"])){
    $kategoriename = $_GET["cid"];
    print($kategoriename);
}
if(isset($_GET["topicid"])){
    $topic = $_GET["topicid"];
    print($topic);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <body>
        <?php
        $beitragstextPost = $_POST["forumsbeitrag"];
        $beitragsIdGet = $_GET["beitrags_id"];
            $abfrage = mysqli_query($db, "select * from forum where beitragstext = '$beitragstextPost'");
            foreach($abfrage as $x => $werte) {
                $kategoriename = $werte['Kategoriename'];
                $id = $werte['beitrags_id'];
                $user = $werte['user'];
                $betreff = $werte['betreff'];
                $beitragstext = $werte['beitragstext'];
                $bezugsId = $werte["bezugs_id"];
            }

            mysqli_query($db, "insert into forum values (NULL,'$kategoriename','$beitragsIdGet','$benutzername',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP(), 'RE: $topic', '$beitragstextPost')");
           print ("<p>Vielen Dank für Ihren Beitrag!</p>");
           header("Location: index.php?success")

        ?>
        <br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
        <?php if ($eingeloggt) {
            print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");
        } ?>
    </body>
</html>
