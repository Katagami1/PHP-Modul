<?php
$texte = array("Hallo mein Name ist Connor", "Markus ist ein n", "Kara hätte nicht Haare schneiden sollen", "Mira komm nach Düsseldorf", "Schwanz mit Jägersoße");
$max = count($texte) - 1;
$zufallszahl = rand(0, $max);
echo $texte[$zufallszahl];