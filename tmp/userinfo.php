<?php
session_start();
$eingeloggt = false;
$benutzername = $_COOKIE["benutzername"];
$db = mysqli_connect("localhost", "root");
mysqli_select_db($db, "forum");
$geschlecht = "";
$alter = 0;
$groesse = 0;
$gewicht = 0;

if(($_COOKIE["eingeloggt"] == "true")) {
    $eingeloggt = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Benutzerinfo</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<tr>
    <td><p>Ihr Geschlecht</p></td>
    <select name="geschlecht">
        <option value="M">Männlich</option>
        <option value="W">Weiblich</option>
        <option value="D">Divers</option>
    </select>
<tr>
    <td><p>Ihr Alter</p></td>
    <td><input type="number" name="alter"></td></tr>
    <?php print("Jahre"); ?>
    <tr>
        <td><p>Ihre Größe</p></td>
        <td><input type="number" name="groesse"></td></tr>
    <?php print("cm"); ?>
<tr>
    <td><p>Ihr Gewicht</p></td>
    <td><input type="number" name ="gewicht"></td></tr>
    <?php print("kg"); ?>
<br> <br>
<input type="submit" value="Abschicken" />
<tr>
</body>

<?php
if (!empty($_POST["geschlecht"]) && !empty($_POST["alter"]) && !empty($_POST["groesse"]) && !empty($_POST["gewicht"])){
    echo "<br><br>Sie haben erfolgreich Ihr Profil geupdatet! <br>";
    echo "<br>Das gewählte Geschlecht: " .($_POST["geschlecht"]);
    echo "<br> Sie haben das Alter: " . htmlspecialchars($_POST["alter"]) . " eingeben";
    echo "<br> Die eingegebene Größe beträgt: ". htmlspecialchars($_POST["groesse"]) ."cm";
    echo "<br> Das eingegebene Gewicht beträgt: ". htmlspecialchars($_POST["gewicht"]) ."kg";
    $geschlecht = $_POST["geschlecht"];
    $alter = $_POST["alter"];
    $groesse = $_POST["groesse"];
    $gewicht = $_POST["gewicht"];
    #$befehl = mysqli_query($db, "insert into Benutzer (Geschlecht, Alter, Gewicht) VALUES ('$geschlecht', '$alter', '$gewicht')");
    $befehl = mysqli_query($db, "UPDATE Benutzer SET Geschlecht = '$geschlecht' WHERE Benutzername = '$benutzername'");
    $befehl = mysqli_query($db, "UPDATE Benutzer SET Lebensalter = $alter WHERE Benutzername = '$benutzername'");
    $befehl = mysqli_query($db, "UPDATE Benutzer SET Groesse = $groesse WHERE Benutzername = '$benutzername'");
    $befehl = mysqli_query($db, "UPDATE Benutzer SET Gewicht = $gewicht WHERE Benutzername = '$benutzername'");
} else{
    print("<br> <br> Bitte füllen Sie alle Felder aus!");
}
?>
<br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
<?php if ($eingeloggt) {print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>"); } ?>
</html>