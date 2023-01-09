<!DOCTYPE html>
<html lang="en">

<html>
<head>
    <title>Das Gesundheits- & Fitnessforum</title>
</head>
<body>
<h3>Das Gesundheits- & Fitnessforum</h3>
<table border="1" width="500">
    <th>Beitrag</th>
    <th>von</th>
    <th>Datum und Uhrzeit</th>

    <?php

    $db = mysqli_connect("localhost", "root");
    mysqli_select_db($db, "forum");
    $anfrage = "SELECT * from forum";
    $ergebnis = mysqli_query($db, $anfrage);
    $anzahl = mysqli_num_rows($ergebnis);
    for ($a = $anzahl - 1; $a > -1; $a--) {
        mysqli_data_seek($ergebnis, $a);
        $zeile = mysqli_fetch_row($ergebnis);
        print("<tr align = 'center'>");
        print("<td>");
        print("<a href='read.php?forums_id=");
        print($zeile[0]);
        print("'>");
        print($zeile[6]);
        print("</a>");
        print("</td>");
        print("<td>");
        print($zeile[2]);
        print("<td>");
        print($zeile[4]);
        print(" um ");
        print($zeile[5]);
        print("</td>");
        print("</tr>");
    }
    print("</table>");
    print ("<br> <a href='register.php'>Neu hier? Registriere dich!</a>");
    print ("<br> <a href='login.php'>Du hast schon einen Account? Hier geht es zum Login!</a>");
    mysqli_close($db);
    ?>
</table>
</body>
</html>
