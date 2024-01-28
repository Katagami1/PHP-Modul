<!DOCTYPE html>
<html lang="en">
<head><title>The Topic</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #ecf0f1;
            margin: 0;
            padding: 0;
        }

        .haupt-block {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 36px;
            color: #3498db;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            color: #2ecc71;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: left;
        }

        a {
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        } </style>
</head>
<body>
<div class="haupt-block"><h1>The Topic</h1>
    <?php
    session_start();
    # Es sollen keine Fehlermeldungen für den Nutzer sichtbar sein
    error_reporting(E_ERROR | E_PARSE);
    $eingeloggt = false;
    $vorname = "";
    $nachname = "";
    # Cookie braucht man z.B. für persönliche Begrüßung oder Sonstiges
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

    if (isset($_GET["success"])) {
        echo "<h3>Erfolgreich ausgeführt.</h3>";
    }

    $abfrage = mysqli_query($db, "select * from benutzer where Benutzername = '$benutzername'");

    # Ganze Selectbfrage wird in Array "$werte" reingeschrieben und Variablen = Datenbankvariablen
    foreach($abfrage as $x => $werte) {
        $vorname = $werte["vorname"];
        $nachname = $werte["nachname"];
    }

    ?>
    <div class="haupt-block">
        <?php if ($eingeloggt) { print ("<h2>Hallo $vorname $nachname"); } ?></h2>
        <table border="1" width="500">
            <th>Kategorie</th>
            <th>Beitrag</th>
            <th>von</th>
            <th>Datum und Uhrzeit</th>
            <?php
            $anfrage = "SELECT * from forum";
            # ALles aus SELECT Abfrage in Ergebnis
            $ergebnis = mysqli_query($db, $anfrage);
            # Anzahl von Zeilen
            $anzahl = mysqli_num_rows($ergebnis);
            # Alles aus Tabelle "forum" von Datenbank wird in neue Tabelle eingefügt
            for ($a = $anzahl - 1; $a > -1; $a--) {
                mysqli_data_seek($ergebnis, $a);
                $zeile = mysqli_fetch_row($ergebnis);
                print("<tr align = 'center'>");
                print("<td>");
                # zeile[1] ist der Kategoriename
                print($zeile[1]);
                print("</td>");
                print("<td>");
                print("<a href='read.php?beitrags_id=");
                # zeile[0] = Beitragsid, wichtig für read.php
                print($zeile[0]);
                print("'>");
                # zeile[6] = Betreff
                print($zeile[6]);
                print("</a>");
                print("</td>");
                print("<td>");
                # zeile[3] = Username
                print($zeile[3]);
                print("<td>");
                # zeile[4] = datum
                print($zeile[4]);
                print(" um ");
                # zeile[5] = Uhrzeit
                print($zeile[5]);
                print("</td>");
                print("</tr>");
                $kategoriename = $zeile[1];
                $kategeoriearray .= $kategoriename ."|";
            }
            $kategeoriearray = explode("|", $kategeoriearray);
            print("</table>");

            # Ganze Selectbfrage wird in Array "$werte" reingeschrieben und Variablen = Datenbankvariablen
            foreach($abfrage as $x => $werte) {
                $geschlecht = $werte["Geschlecht"];
                $alter = $werte["Lebensalter"];
                $groesse = $werte["Groesse"];
                $gewicht = $werte["Gewicht"];
            }
            ?>
            <form action="sort.php" method="post">
                <label for="browser">Verfügbare Kategorien:</label>
                <input list="kategorie">
                <?php
                print ("<br> <br> <br> <datalist id='kategorie'>
                    <option value='$kategeoriearray[0]'> <option value='$kategeoriearray[1]'>
                    <option value='$kategeoriearray[2]'><option value='$kategeoriearray[3]'>
                     <option value='$kategeoriearray[4]'<option value='$kategeoriearray[5]'></datalist>");
                print("<form method='post'>");
                #print("<br><input type='submit' name='abschicken' value='sortieren'>");
                print("</td>");
                print("<td>");
                print("<a href='userinfo.php'><br>Sie möchten Ihre Daten ändern? Klicken sie hier!</a>");

                ?>
                <?php
                # Funktion für Sortieren, geht nicht
                if (!isset($_POST["kategorie"])) {
                    $kategeoriearray = $_POST["kategorie"];
                    $abfrage = mysqli_query($db, "select * from forum order by '$kategeoriearray' DESC");
                }

                # Wenn man eingeloggt ist und die statischen Daten unvollständig sind => muss man ausfüllen
                if ($eingeloggt && ($geschlecht == "" || $alter == 0 || $groesse == 0 || $gewicht == 0)){
                    print ("<br><br> <a href='userinfo.php'>Deine Daten sind noch unvollständig. Bitte aktualisiere sie.</a><br>");
                } else {
                    # Wenn statische Daten gefüllt sind, kann man sie ansehen und dynamische Daten eingeben
                    print("<br> <a href='userdetails.php'>Deine persönliche Angaben</a>");
                    print("<br> <a href='userdynamic.php'>Trage deine Trainingseinheiten ein</a>");
                }
                if ($eingeloggt) {
                    print("<br> <a href='new.php'>Erstelle einen neuen Beitrag!</a>");
                } else {
                    print ("<br><br> <a href='register.php'>Neu hier? Registriere dich!</a><br>");
                    print ("<br> <a href='login.php'>Du hast schon einen Account? Hier geht es zum Login!</a>");
                }
                mysqli_close($db);
                ?>
        </table>
    </div>
    </body>
    </html>

</body>
</html>