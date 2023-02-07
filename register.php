<?php
    # Start der Sitzung
    session_start();
    # Datenbank connection
    $verbindung = mysqli_connect("localhost", "root");
    mysqli_select_db($verbindung, "forum");
    # Cookie zum Einspeichern ob man eingeloggt ist oder nicht und den Benutzernamen
    setcookie("eingeloggt", "false");
    setcookie("benutzername", "");

    # Überprüft ob in der URL "register" steht => Inhalt von den Feldern in Variablen gespeichert
    if(isset($_GET["register"])) {
        $vorname = $_POST["firstname"];
        $nachname = $_POST["lastname"];
        $benutzername = $_POST["username"];
        $passwort = $_POST["pw"];
        $passwort_abgleich = $_POST["pw-again"];

        if ($passwort != $passwort_abgleich) {
            header("Location: register.php?error1");
            return;
        }

        # SQL Abfrage sucht eingegebenen Benutzernamen in der Datenbank
        $abfrage = mysqli_query($verbindung, "select Benutzername from benutzer where Benutzername ='$benutzername';");
        $abfrage_gefunden = mysqli_num_rows($abfrage);

        # Wenn Benutzername gefunden wurde => Error
        if ($abfrage_gefunden != 0) {
            header("Location: register.php?error2"); #Benutzername bereits vergeben
        }

        # SQL Befehl, neuen User in Datenbank einfügen
        $befehl = mysqli_query($verbindung, "insert into benutzer (Benutzername, vorname,
                      nachname, passwort) values ('$benutzername', '$vorname', '$nachname', '$passwort');");
        header("Location: login.php?success");


    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registrierung</title>
    </head>
    <body>
        <h1>Willkommen im Gesundheits&- Fitnessforum</h1>
        <h2>Registrieren</h2>

        <?php if(isset($_GET["error1"])) {
            echo "<h3 stlye='color: red;'>Die Passwörter stimmen nicht überein.</h3>";
        } else if(isset($_GET["error2"])) {
            echo "<h3 stlye='color: red;'>Benutzername bereits vergeben.</h3>";
        }?>

        <form method="post" action="?register">
            <input type="text" id="firstname" name="firstname" placeholder="Vorname" required><br><br>
            <input type="text" id="lastname" name="lastname" placeholder="Nachname" required><br><br>
            <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            <input type="password" id="pw" name="pw" placeholder="Passwort" required><br><br>
            <input type="password" id="pw-again" name="pw-again" placeholder="Passwort wiederholen" required> <br><br>
            <input type="submit">
            <?php #a href = Text als Link => Weiterleitung zu anderer Datei ?>
            <br> <br><a href='login.php'>Du hast schon einen Account? Hier geht es zum Login!</a>
            <br> <a href='index.php'>Zurück zum Forumsüberblick</a>
        </form>
    </body>
</html>