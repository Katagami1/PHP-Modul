Beispiel: func_num_args() und func_get_arg():
<html>
<body>
<?php
function addiere() {
    $anz = func_num_args();
    echo "<p>Anzahl der Werte: $anz<br />";
    echo "Werte: ";
    $sum = 0;
    for($i=0; $i<$anz; $i++) {
        echo func_get_arg($i) . " ";
        $sum = $sum + func_get_arg($i);
    }
    echo "<br />Summe der Werte: $sum</p>";
}
addiere(2,3,6);
addiere(13,26);
addiere(65,-3,88,31,12.5,7);

$arr = array(4, 5 => 12, 187 => 15, "element 3" => "lel");
echo $arr["element 3"];
echo"<br/>Wenn man echo \$arr[0], kommt noch die '4' raus, aber danach ist dictionary mäßig."
?>
</body>
</html>