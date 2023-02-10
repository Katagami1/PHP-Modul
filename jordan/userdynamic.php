<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$eingeloggt = false;
$benutzername = $_COOKIE["benutzername"];
$db = mysqli_connect("localhost", "root");
mysqli_select_db($db, "forum");
$training = "";
$Laufstrecke = 0;
$udauerh = 0;
$udauermin = 0;

if (($_COOKIE["eingeloggt"] == "true")) {
    $eingeloggt = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trainingsdetails</title>
</head>
<body>
<tr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <td><p>Bewerten Sie Ihr Training.</p></td>
        <select name="training">
            <option value="Gut">Gut</option>
            <option value="Mittel">Mittel</option>
            <option value="Schlecht">Schlecht</option>
        </select>
<tr>
    <td><p>Ihre heutige Laufstrecke</p></td>
    <td><input type="number" name="Laufstrecke"></td>
</tr>
<?php print("km"); ?>
<tr>
    <td><p>Ihre heutige Übungsdauer</p></td>
    <td><input type="number" name="udauerh"></td>
</tr>
<?php print("h"); ?>
<td><input type="number" name="udauermin"></td>
</tr>
<?php print("min"); ?>
<br> <br>
<input type="submit" value="Abschicken"/>
<tr>
</body>

<?php
if($eingeloggt) {
    if (!empty($_POST["training"]) && !empty($_POST["Laufstrecke"]) && (!empty($_POST["udauerh"]) || !empty($_POST["udauermin"]))) {
        echo "<br><br>Sie haben erfolgreich Ihr Profil geupdatet! <br>";
        $training = $_POST["training"];
        $Laufstrecke = $_POST["Laufstrecke"];
        $udauerh = $_POST["udauerh"];
        $udauermin = $_POST["udauermin"];
        $befehl = mysqli_query($db, "insert into dynamicstats (benutzername, Stimmung, Laufstrecke, udauerh, udauermin) 
    VALUES ('$benutzername', '$training', '$Laufstrecke', '$udauerh', '$udauermin')");
        #$befehl = mysqli_query($db, "UPDATE Benutzer SET Geschlecht = '$geschlecht' WHERE Benutzername = '$benutzername'");
    } else {
        print("<br> <br> Bitte füllen Sie alle Felder aus!");
    }

print("<br> <br> <a href='traininghistory.php'>Zu Ihrem Trainingsverlauf</a>");
}  else {
    print("<br> <br> Bitte melden Sie sich an, um Ihr Training enizutragen!");
}
?>
<?php if ($eingeloggt) {
    print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");
} ?>
<br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
</html>