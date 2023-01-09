<!DOCTYPE html>
<html lang="en">

<html>
<body>
<h3>Das Gesundheits- & Fitnessforum</h3>
<div style = "width: 400px">

<?php
    $id = $_GET['forums_id'];
    $db = mysqli_connect("localhost", "root");
    mysqli_select_db($db, "forum");
    $anfrage = "SELECT * FROM forum WHERE beitrags_id LIKE '";
    $anfrage.=$id;
    $anfrage.="'";
    $ergebnis = mysqli_query($db, $anfrage);
    $zeile = mysqli_fetch_row($ergebnis);
    print("<b>Betreff: </b>");
    print($zeile[6]);
    print("<br><b>von: </b>");
    print($zeile[2]);
    print("<br><b>E-mail: </b>");
    print($zeile[3]);
    print("<br><b>Geschrieben am: </b>");
    print($zeile[4]);
    print(" um ");
    print($zeile[5]);
    print("<br><br><hr><br><br>");
    print($zeile[7]);
    mysqli_close($db);
?>

</div>
</body>
</html>