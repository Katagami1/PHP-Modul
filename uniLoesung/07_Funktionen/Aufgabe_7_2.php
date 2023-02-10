<html>
<head>
<?php
   function rechne($a, $b, &$su, &$pr){
      $su = $a + $b;
      $pr = $a * $b;
   }
?>
</head>
<body>
<?php
   $x = 7;
   $y = 5;
   rechne($x, $y, $summe, $produkt);
   echo "<p>Die Summe von $x und $y ist $summe</p>";
   echo "<p>Das Produkt von $x und $y ist $produkt</p>";
?>
</body>
</html>
