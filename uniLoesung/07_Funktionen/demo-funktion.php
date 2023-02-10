<?php
function add($z1, $z2) {
    $summe = $z1 + $z2;
    return $summe;
}

$c= add(3,4); // aufrufende Stelle
echo "Summe: $c <br />";

$x = 5;
$c= add($x,12); // aufrufende Stelle
echo "Summe: $c <br />";

// aufrufende Stelle innerhalb der Ausgabe
echo "Summe: " . add(13,2) . "<br />";

// Ausgabe in Zeichenkette: falsch!
echo "Summe: add(13,2)";
