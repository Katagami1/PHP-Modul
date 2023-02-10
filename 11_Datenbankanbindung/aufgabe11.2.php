<?php
$connect = mysqli_connect("localhost", "root");
$db = mysqli_select_db($connect, "hardware");
$abfrage = mysqli_query($db, "SELECT hersteller, typ, prod, artnummer FROM fp WHERE prod <= '2008-06-31' AND prod >= '2008-01-01' ORDER BY  prod");
$ergebnis = mysqli_num_rows($abfrage);
echo "$ergebnis Datensätze gefunden <br/>";


?>