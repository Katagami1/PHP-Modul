<html>
<head>
<?php
   function vermerk($vor, $nach, $abt){
      echo "<table width='30%' border='1'>";
      echo "<tr><td>"
        . "Programmteil von $vor $nach, Abteilung $abt<br />"
        . "E-Mail: $vor.$nach@$abt.phpdevel.de"
        . "</td></tr>";
      echo "</table>";
   }
?>
</head>
<body>
<?php
   vermerk("Bodo", "Berg", "FE2");
   vermerk("Hans", "Heim", "SU3");
?>
</body>
</html>
