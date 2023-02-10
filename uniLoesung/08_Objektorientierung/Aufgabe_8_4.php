<html> 
<body>
<?php
/* Für dieses Programm alle Fehler anzeigen */
ini_set("error_reporting", 32767);

/* Variable unbekannt */
try {
    if(!isset($a))
        throw new Exception("Variable unbekannt");
    $c = 2 * $a;
    echo "<p>$c</p>";
}
catch(Exception $e) {
      echo $e->getMessage() . "<br />";
}
finally {
    echo "<p>Ende, Variable unbekannt</p>";
}

/* Division durch 0 */
$x = 24;
for($y=4; $y>-3; $y--) {
   try {
       if($y == 0)
            throw new Exception("Division durch 0");
       $z = $x / $y;
      echo "$x / $y = $z<br />";
   }
   catch(Exception $e) {
         echo $e->getMessage() . "<br />";
    }
}

/* Zugriff auf Funktion */
try {
    if(!function_exists("fkt"))
          throw new Exception("Funktion unbekannt");       
		// der Rest des try-Blocks wird nicht mehr bearbeitet.
    fkt();
}
catch(Exception $e) {
    echo $e->getMessage() . "<br />";
}
finally {      // Die Anweisungen in einem finally- Block werden 
			// in jedem Fall durchgeführt
     echo "<p>Ende, Funktion unbekannt</p>";
}
echo "Ende";
?>
</body>
</html>
