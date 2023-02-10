<<html>
<body>
<?php
   $con = mysqli_connect("","root");
   mysqli_select_db($con, "hardware");

   $sql = "update fp set hersteller = '" . $_POST["her"] . "',"
     . " typ = '" . $_POST["typ"] . "',"
     . " gb = " . $_POST["gb"] . ","
     . " preis = " . $_POST["pre"] . ","
     . " artnummer = '" . $_POST["anr"] . "',"
     . " prod = '" . $_POST["pro"] . "'"
     . " where artnummer = '" . $_POST["orianr"] . "'";
   mysqli_query($con, $sql);

   $num = mysqli_affected_rows($con);
   if ($num>0)
      echo "<p>Der Datensatz wurde geändert</p>";
   else
      echo "<p>Der Datensatz wurde nicht geändert</p>";
   mysqli_close($con);
?>
<p>Zurück zur <a href="u_db_einzel_a.php">Auswahl</a></p>
</body>
</html>

