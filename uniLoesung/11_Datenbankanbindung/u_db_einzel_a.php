<html>
<body>
<p>Wählen Sie aus, welcher Datensatz geändert werden soll:</p>
<form action = "u_db_einzel_b.php" method = "post">
<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "hardware");

   $res = mysqli_query($con, "select * from fp");
   $num = mysqli_num_rows($res);

   // Tabellenbeginn
   echo "<table border='1'>";

   // Überschrift
   echo "<tr> <td>Auswahl</td><td>Hersteller</td>";
   echo "<td>Typ</td><td>Kapazität in GB</td>";
   echo "<td>Preis</td><td>Artikelnummer</td>";
   echo "<td>erstes Produktionsdatum</td></tr>";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
      echo "<td><input type='radio' name='auswahl' value='" . $dsatz["artnummer"] . "' /></td>";
      echo "<td>" . $dsatz["hersteller"] . "</td>";
      echo "<td>" . $dsatz["typ"] . "</td>";
      echo "<td>" . $dsatz["gb"] . "</td>";
      echo "<td>" . $dsatz["preis"] . "</td>";
      echo "<td>" . $dsatz["artnummer"] . "</td>";
      echo "<td>" . $dsatz["prod"] . "</td>";
      echo "</tr>";
   }

   // Tabellenende
   echo "</table>";
   
   mysqli_close($con);
?>
<p><input type="submit" value="Datensatz anzeigen" /></p>
</form>
</body>
</html>

