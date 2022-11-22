<html>
<head>
<?php
#function funktionsname ( [parameter[, ...] ] ) {Anweisungen}
function trennstrich(){
    echo "<br/>";
    for ($i=1; $i<=40; $i=$i+1){
        echo "-";
    }
    echo "<br/>";
}
function add($z1, $z2){
    $summe = $z1 + $z2;
    return $summe;
}
?>
</head>
<body>
<?php
    trennstrich();
    echo "Dies ist ein Programm, ";
    trennstrich();
    echo "in dem mehrmals";
    trennstrich();
    echo "eine Funktion verwendet wird,";
    trennstrich();
    echo "die zu Beginn definiert wurde";
    trennstrich();
    $c = add(3, 4);
    echo "Summe: = $c <br/>";
    $x = 5;
    $c = add($x, 12);
    echo "Summe: $x + 12 = $c <br/>";
?>
</body>
</html>
