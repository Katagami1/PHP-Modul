<html> <body>
<?php
// 1. Zeile und 2. Zeile
$pers = array(array("Maier", "Hans", 6714, 3500),
    array("Schmitz", "Peter", 81343, 3750));
// 3. Zeile
$pers[2][0] = "Mertens";
$pers[2][1] = "Julia";
$pers[2][2] = 2297;
$pers[2][3] = 3621.50;
echo "<table border='1'>";
for($i=0; $i<3; $i++) {
    echo "<tr>";
    for($k=0; $k<4; $k++)
        echo "<td>" . $pers[$i][$k] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body> </html>