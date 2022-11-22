<?php

$tier = "Maus";
$erster = $tier[0];
echo "$tier beginnt mit $erster<br />\n";
$tier[0] = "L";
echo $tier;
if (!isset($tier[4])) {
    echo "<br />\n $tier hat weniger als 5 Buchstaben";
}
echo"<br>";
$name = " Hans-Heinerich "; // 16 Zeichen
$laenge = strlen($name);
echo "$name ist $laenge Zeichen lang (inkl. Leerzeichen)<br />\n";
echo "trim() entfernt Leerzeichen am Anfang und Ende eins Strings"

?>
