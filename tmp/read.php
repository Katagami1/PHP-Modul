<!DOCTYPE html>
<html lang="en">

<html>
<head>
    <title>Das Gesundheits- & Fitnessforum</title>
</head>
<body>
<h3>Das Gesundheits- & Fitnessforum</h3>
<div style = "width: 400px">

<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$eingeloggt = false;
$vorname = "";
$nachname = "";
$benutzername = $_COOKIE["benutzername"];
$beitrags_id = 0;
$kategoriename = "";
$datum = 0;
$uhrzeit = 0;
$user = "";
$betreff = "";
$beitragstext = "";

$db = mysqli_connect("localhost", "root");
mysqli_select_db($db, "forum");

if(($_COOKIE["eingeloggt"] == "true")) {
    $eingeloggt = true;
}
?>
<?php
$id=$_GET['beitrags_id'];
$abfrage = mysqli_query($db, "select * from forum");

foreach($abfrage as $x => $werte) {
    $beitrags_id = $werte["beitrags_id"];
    $kategoriename = $werte["Kategoriename"];
    $user = $werte["user"];
    $datum = $werte["datum"];
    $uhrzeit = $werte["uhrzeit"];
    $betreff = $werte["betreff"];
    $beitragstext = $werte["beitragstext"];
}

$abfrage = mysqli_query($db, "select * from forum where beitrags_id LIKE '$id'");
$zeile=mysqli_fetch_row($abfrage);
print ("<br><br><b>Kategorie: </b>");
print($zeile[1]);
print ("<br><b>Betreff: </b>");
print ($zeile[6]);
print ("<br><b>von: </b>");
print ($zeile[3]);
print ("</a><br><b>Geschrieben am: </b>");
print ($zeile[4]);
print (" um ");
print ($zeile[5]);
print ("<br><br><hr><br><br>");
print ($zeile[7]);
    if($eingeloggt){
        print ("<br> <br> <br> <a href='reply.php?beitrags_id=$id'><button>Antworten</button></a>");
    } else {
        print ("<br> <br> <br> <a href='login.php'>Bitte melde dich an, um diesen Beitrag zu kommentieren!</a>");
    }
    mysqli_close($db);
?>
    <br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
    <?php if ($eingeloggt) {print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>"); } ?>
</div>
</body>
</html>