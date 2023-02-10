<html>
<body>
<?php
   /* Artikelpreise */
   $art1 = 22.5;
   $art2 = 12.3;
   $art3 = 5.2;

   /* Berechnung */
   $ust_prozent = 19;
   $ust_faktor = 1 + $ust_prozent / 100;
   $netto = $art1 + $art2 + $art3;
   $brutto = $netto * $ust_faktor;

   /* Ausgabe */
   echo "<p>Artikel 1: $art1 Euro<br />";
   echo "Artikel 2: $art2 Euro<br />";
   echo "Artikel 3: $art3 Euro</p>";
   echo "<p>Nettosumme: $netto Euro<br />";
   echo "Umsatzsteuer: $ust_prozent %<br />";
   echo "Bruttosumme: $brutto Euro</p>";
?>
</body>
</html>