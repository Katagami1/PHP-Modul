<?php
$pers[0][0] = "00";
$pers[0][1] = "01";
$pers[0][2] = "02";
$pers[0][3] = "03";
$pers[1][0] = "10";
$pers[1][1] = "11";
$pers[1][2] = "12";
$pers[1][3] = "13";
$pers[2][0] = "20";
$pers[2][1] = "21";
$pers[2][2] = "22";
$pers[2][3] = "23";

foreach ($pers as $personen){

}
echo "<table border='1'>";
for($i = 0; $i< 3; $i++) {
    echo "<tr>";
    for ($k = 0; $k < 4; $k++)
        echo "<td>" . $pers[$i][$k] . "</td>";
        echo "</tr>";
}
echo "</table>";

