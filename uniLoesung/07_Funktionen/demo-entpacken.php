<?php
function mittelwert($a, $b, $c, $d, $e){
    return ($a + $b + $c + $d + $e) / 5;
}

echo mittelwert(3.2, 14.5, 5.7, 4.2, 0.2) . "<br />";

$feld = array(5.7, 4.2, 0.2);
echo mittelwert(3.2, 14.5, ...$feld);

?>
