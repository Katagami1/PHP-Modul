<?php
session_start();
$verbindung = mysqli_connect("localhost", "root");
mysqli_select_db($verbindung, "forum");
setcookie("eingeloggt", "false");

if(isset($_GET["error"])) {
    echo '<h3 stlye="color: red;">Die Kombination aus Benutzername und Passwort ist falsch.</h3>';
}

if(isset($_GET["success"])) {
    echo '<h3 stlye="color: green;">Erfolgreich registriert. Du kannst Dich nun einloggen.</h3>';
}

if (isset($_GET["login"])) {
    $benutzername = $_POST["username"];
    $passwort = $_POST["pw"];

    $abfrage = mysqli_query($verbindung, "select * from benutzer where Benutzername  = '$benutzername' and passwort = '$passwort';");
    $abfrage_gefunden = mysqli_num_rows($abfrage);

    if($abfrage_gefunden != 1) {
        header("Location: login.php?error");
    }

    echo "<h3 stlye='color: green;'>Eingeloggt.</h3>";
    setcookie("eingeloggt", "true");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
<h1>Willkommen im Fitness-Forum</h1>
<h2>Anmelden</h2>
<form method="post" action="?login">
    <input type="text" id="username" name="username" placeholder="Username" required><br><br>
    <input type="password" id="pw" name="pw" placeholder="Passwort" required><br><br>
    <button type="submit" name="submit">Einloggen</button><br>
</form>
<br>
<a href="register.php">Noch keinen Account?</a>
<br> <a href='index.php'>Zurück zum Forumsüberblick</a>
</body>
</html>