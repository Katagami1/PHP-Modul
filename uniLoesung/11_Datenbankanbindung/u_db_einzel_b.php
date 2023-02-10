<html>
<body>
<?php
if (isset($_POST["auswahl"]))
{
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "hardware");

   $sql = "select * from fp where artnummer = '" . $_POST["auswahl"] . "'";
   $res = mysqli_query($con, $sql);
   $dsatz = mysqli_fetch_assoc($res);

   echo "<p>Führen Sie die Änderungen durch,<br />";
   echo "betätigen Sie anschließend den Button</p>";
   echo "<form action = 'u_db_einzel_c.php' method = 'post'>";

   echo "<p><input name='her' value='" . $dsatz["hersteller"] . "' /> Hersteller</p>";
   echo "<p><input name='typ' value='" . $dsatz["typ"] . "' /> Typ</p>";
   echo "<p><input name='gb'  value='" . $dsatz["gb"] . "' /> Kapazität in GB</p>";
   echo "<p><input name='pre' value='" . $dsatz["preis"] . "' /> Preis</p>";
   echo "<p><input name='anr' value='" . $_POST["auswahl"] . "' /> Artikelnummer</p>";
   echo "<p><input name='pro' value='" . $dsatz["prod"] . "' /> erstes Produktionsdatum</p>";
   echo "<input type='hidden' name='orianr' value='" . $_POST["auswahl"] . "' />";
   echo "<p><input type='submit' value='Änderungen in Datenbank speichern'>";
   echo "<input type='reset' /></p>";
   echo "</form>";
   
   mysqli_close($con);
}
else
   echo "<p>Es wurde kein Datensatz ausgewählt</p>";
?>
</body>
</html>
