<html>
<head>
<body>
<?php
echo "<h3> Übergabe per Wert </h3>\n";
function veraendern(&$a){
    $a++;
    return $a;
}

$c = 2;
echo "Vor Funktionsaufruf: \$c ist $c <br/>\n";
veraendern($c);
echo "Nach Funktionsaufruf: \$c ist $c<br/>\n";

echo "<h3>Übergabe per Referenz</h3>\n";
function veraendern2(&$a){
    $a++;
}

echo "Vor Funktionsaufruf: \$c ist $c <br/>\n";
veraendern2($c);
echo "Nach Funktionsaufruf: \$c ist $c<br/>\n";

echo "Aufruf der Funktion per Referenz, z.B. veraendern(&\$c), ist veraltet!";

?>

</body>
</head>
</html>
