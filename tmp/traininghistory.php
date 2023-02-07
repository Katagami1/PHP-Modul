<?php
session_start();
$eingeloggt = false;
$benutzername = $_COOKIE["benutzername"];
$gewicht = 0;
$db = mysqli_connect("localhost", "root");
mysqli_select_db($db, "forum");
$query = mysqli_query($db, "select Gewicht from benutzer where Benutzername = '$benutzername'");
foreach($query as $x => $werte) {
    $gewicht = $werte["Gewicht"];
}

$training = "";
$Laufstrecke = 0;
$udauerh = 0;
$udauermin = 0;
$trainingsid = 0;

if (($_COOKIE["eingeloggt"] == "true")) {
    $eingeloggt = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ihr Trainingsverlauf</title>
</head>
<body>
<h2>Ihr Trainingsverlauf</h2>
<table border='1'>
    <?php
    $abfrage = mysqli_query($db, "select Stimmung, Laufstrecke, udauerh, udauermin, trainingsdatum from dynamicstats where benutzername = '$benutzername'");
    $anzahl = mysqli_num_rows($abfrage);
    print("<td>");
    print("Stimmung");
    print("</td>");
    print("<td>");
    print("Laufstrecke");
    print("</td>");
    print("<td>");
    print("Zeit");
    print("</td>");
    print("<td>");
    print("Datum");
    print("<td>");
    for ($a = $anzahl - 1; $a > -1; $a--) {
        mysqli_data_seek($abfrage, $a);
        $zeile = mysqli_fetch_row($abfrage);
        print("<tr align = 'center'>");
        print("<td>");
        print($zeile[0]);
        print("</td>");
        print("<td>");
        print($zeile[1] . "km");
        print("</td>");
        print("<td>");
        print($zeile[2] . "h");
        print($zeile[3] . "min");
        print("</td>");
        print("<td>");
        print($zeile[4]);
        print("</td>");
        print("<td>");
        if(isset($_POST['knopfdruck'])){
         print("In diesem Training haben Sie: " . $gewicht * $zeile[1] * 0.97 . "kcal verbrannt");
         print("<br> Hinweis: Es wird nur die zurückgelgte Distanz berücksichtigt!");
        }
        print("<form method='post'>");
        print("<input type='submit' name='knopfdruck' value='Kalorien verbrannt'>");
        print("</td>");
        print("<td>");
    }
    if(isset($_POST['delete'])){
        $anfrage = mysqli_query($db,"select Trainingsid from dynamicstats");
        foreach($anfrage as $x => $werte) {
            $trainingsid = $werte["Trainingsid"];
        }
        $query = mysqli_query($db, "delete from dynamicstats where Trainingsid = '$trainingsid'");
    }
    print("<form method='post'>");
    print("<input type='submit' name='delete' value='Training löschen'>");
    print("</td>");
    print("</tr>");
    print("</table>");
    print ("<br> <br> <br> <a href='https://lauftipps.ch/tools/tabelle-kalorienverbrauch/' target='_blank' rel='noreferrer noopener'><button>Quelle für Formel</button></a>");
    ?>

    <br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
    <?php if ($eingeloggt) {
        print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");
    } ?>
</table>
</body>
</html>
