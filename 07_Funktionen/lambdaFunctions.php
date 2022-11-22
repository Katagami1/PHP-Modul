<?php
$lambda = function($a){
    return $a/2;
};
$ergebnis = $lambda(5);
$zahlen = array(4,33,2);
$result = array_map($lambda, $zahlen);
print_r($ergebnis);
echo "</br> Ermöglicht, Funktionen als Parameter zu übergeben, um bestimmte Verarbeitungsschritte durchzuführen, wie z.B. bei der Funktion array_map() </br>
        We use lambda functions when we require a nameless function for a short period of time";

?>