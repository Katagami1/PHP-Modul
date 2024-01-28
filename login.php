<?php session_start();
$verbindung = mysqli_connect("localhost", "root");
mysqli_select_db($verbindung, "forum");
setcookie("eingeloggt", "false");
setcookie("benutzername", "");
if (isset($_GET["error"])) {
    echo '<h3 style="color: red;">Die Kombination aus Benutzername und Passwort ist falsch.</h3>';
} else if (isset($_GET["success"])) {
    echo '<h3 style="color: green;">Erfolgreich registriert. Du kannst Dich nun einloggen.</h3>';
} else if (isset($_GET["logged-out"])) {
    echo '<h3 style="color: green;">Du hast dich erfolgreich ausgeloggt.</h3>';
}
if (isset($_GET["login"])) {
    # Eingabe von Textfeld in Variablen speichern
    $benutzername = $_POST["username"];
    $passwort = $_POST["pw"];         # SQL Abfrage überprüft ob eingegebener User & PW in Datenbank ist
    $abfrage = mysqli_query($verbindung, "select * from benutzer where Benutzername  = '$benutzername' and passwort = '$passwort';");
    $abfrage_gefunden = mysqli_num_rows($abfrage);
    if ($abfrage_gefunden != 1) {
        header("Location: login.php?error");
        return;
    }
    echo "<h3 style='color: green;'>Eingeloggt.</h3>";
    setcookie("eingeloggt", "true");
    setcookie("benutzername", "$benutzername");         #Automatisch auf Forumsseite weitergeleitet
    header("Location: index.php");
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>         body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3 {
            color: #3498db;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"], input[type="password"] {
            width: auto;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            background-color: #3498db;
            color: #ffffff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        a {
            color: #3498db;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }     </style>
</head>
<body><h1>Willkommen bei The Topic</h1>
<h2>Anmelden</h2>
<form method="post" action="?login"><input type="text" id="username" name="username" placeholder="Username"
                                           required><br><br> <input type="password" id="pw" name="pw"
                                                                    placeholder="Passwort" required><br><br>
    <button type="submit" name="submit">Einloggen</button>
    <br></form>
<br> <a href="register.php">Noch keinen Account?</a> <br> <a href='index.php'>Zurück zum Forumsüberblick</a></body>
</html>