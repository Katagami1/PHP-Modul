<html>
<head>
<body>
<?php
function rechne($z1, $z2, &$summe, &$produkt){
    $summe = $z1 + $z2;
    $produkt = $z1 * $z2;
}
$a = 4;
$b = 5;
rechne($a, $b, $s, $p);
printf("Die Summe von %d und %d ist %d <br/>", $a, $b, $s);
printf("Das Produkt von %d und %d ist %d", $a, $b, $p);


?>
</body>
</head>
</html>
