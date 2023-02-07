<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$eingeloggt = false;
$benutzername = $_COOKIE["benutzername"];
$db = mysqli_connect("localhost", "root");
mysqli_select_db($db, "forum");
$geschlecht = "";
$alter = 0;
$gewicht = 0;

if (($_COOKIE["eingeloggt"] == "true")) {
    $eingeloggt = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ihre persönlichen Angaben</title>
</head>
<body>
<h2>Ihre persönlichen Angaben</h2>
<?php
if ($eingeloggt) {
    $anfrage = mysqli_query($db, "select Geschlecht, Lebensalter, Groesse, Gewicht from Benutzer where Benutzername = '$benutzername'");
    $zeile = mysqli_fetch_row($anfrage);
    print("Ihr Geschlecht ist : ") . $zeile[0];
    print("<br>Ihr Alter ist : ") . $zeile[1];
    print("<br>Ihre Größe ist : ") . $zeile[2];
    print("<br>Ihr Gewicht ist : ") . $zeile[3];
            if(isset($_POST['knopfdruck'])){
         print("<br><br>Ihr BMI beträgt: " . $zeile[3]/ (($zeile[2])/100)**2);
        print ("<br> <br> <br> <a href='https://www.barmer.de/gesundheit-verstehen/ernaehrungsgesundheit/bmi-rechner-1004244' 
        target='_blank' rel='noreferrer noopener'><button>Quelle für Formel</button></a>");
        }
        print("<form method='post'>");
        print("<br><input type='submit' name='knopfdruck' value='BMI berechnen'>");
        print("</td>");
        print("<td>");
        print("<a href='userinfo.php'><br>Sie möchten Ihre Daten ändern? Klicken sie hier!</a>");
    } else {
    print("<br> <br> Bitte melden Sie sich an, um Ihre persönlichen Daten einzusehen!");
}
?>
<br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
<?php if ($eingeloggt) {
    print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");
} ?>

</html>