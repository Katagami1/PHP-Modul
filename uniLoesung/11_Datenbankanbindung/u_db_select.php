<html>
<body>
<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "hardware");

   $sql = "select * from fp where hersteller = '" . $_POST["herst"] . "'";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   if ($num==0) echo "Keine passenden Datens�tze gefunden";

   // Tabellenbeginn
   echo "<table border='1'>";

   // Überschrift
   echo "<tr> <td>Hersteller</td> <td>Typ</td>";
   echo "<td>GB</td> <td>Preis</td> <td>Artnr.</td>";
   echo "<td>Datum ...</td> </tr>";

   while ($dsatz = mysqli_fetch_assoc($res))
   {
      echo "<tr>";
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
</body>
</html>

