<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
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

    $db = mysqli_connect("localhost", "root");
    mysqli_select_db($db, "forum");

    if(($_COOKIE["eingeloggt"] == "true")) {
        $eingeloggt = true;
    }

    if (isset($_GET["success"])) {
        echo "<h3>Erfolgreich ausgeführt.</h3>";
    }

    $abfrage = mysqli_query($db, "select * from benutzer where Benutzername = '$benutzername'");

    foreach($abfrage as $x => $werte) {
        $vorname = $werte["vorname"];
        $nachname = $werte["nachname"];
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Das Gesundheits- & Fitnessforum</title>
    </head>
    <body>
        <div class="haupt-block">
            <h1>Das Gesundheits- & Fitnessforum</h1>
            <?php if ($eingeloggt) { print ("<h2>Hallo $vorname $nachname"); } ?></h2>
            <table border="1" width="500">
                <th>Kategorie</th>
                <th>Beitrag</th>
                <th>von</th>
                <th>Datum und Uhrzeit</th>
                <?php
                    $anfrage = "SELECT * from forum";
                    $ergebnis = mysqli_query($db, $anfrage);
                    $anzahl = mysqli_num_rows($ergebnis);
                    for ($a = $anzahl - 1; $a > -1; $a--) {
                        mysqli_data_seek($ergebnis, $a);
                        $zeile = mysqli_fetch_row($ergebnis);
                        print("<tr align = 'center'>");
                        print("<td>");
                        print($zeile[1]);
                        print("</td>");
                        print("<td>");
                        print("<a href='read.php?beitrags_id=");
                        print($zeile[0]);
                        print("'>");
                        print($zeile[6]);
                        print("</a>");
                        print("</td>");
                        print("<td>");
                        print($zeile[3]);
                        print("<td>");
                        print($zeile[4]);
                        print(" um ");
                        print($zeile[5]);
                        print("</td>");
                        print("</tr>");
                        $kategoriename = $zeile[1];
                        $kategeoriearray .= $kategoriename ."|";
                    }
                    $kategeoriearray = explode("|", $kategeoriearray);
                    print("</table>");
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
                if (!isset($_POST["kategorie"])) {
                    $kategeoriearray = $_POST["kategorie"];
                    $abfrage = mysqli_query($db, "select * from forum order by '$kategeoriearray' DESC");
                }

                    if ($eingeloggt && ($geschlecht == "" || $alter == 0 || $groesse == 0 || $gewicht == 0)){
                        print ("<br><br> <a href='userinfo.php'>Deine Daten sind noch unvollständig. Bitte aktualisiere sie.</a><br>");
                    } else {
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
