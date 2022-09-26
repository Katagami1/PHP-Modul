<?php

$tabelle =array();
echo "<table border='1'>";
for($i=0; $i<10; $i++) {
    echo "<tr";
    for($k=0; $k<10; $k++)
    $erg = $i * $k;
    echo "<td>" . $tabelle[$i][$k] . "</td>";
    echo "</tr>";
}
echo "</table>";

