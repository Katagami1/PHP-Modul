<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Brutto-Netto interaktiv</title>
</head>
<body>
   <form method="get" action="<?php  
        htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  Nettowert:<br />
  <input type="text" name="wert" size="3" /><br />
     MWSt.-Satz<br />
    <select name="faktor">
       <option value="7">7%</option>
        <option value="19">19%</option>
    </select> <br />
  <input type="submit" value="Absenden" />
 </form>
 <?php
   function bruttoberechnen($wert, $faktor)
   {
      return $wert * (100 + $faktor) / 100;
   }
   if (!empty($_GET["wert"])) {
     $netto = $_GET["wert"];
     $faktor = $_GET["faktor"];
     $ergebnis = bruttoberechnen ($netto, $faktor);
     echo "<br />$netto ergibt $ergebnis brutto, bei einem MWST. 
         von $faktor %";
   }
 ?>
 </body>
 </html>
