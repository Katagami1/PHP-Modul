<table border='2.5'>
<?php
for($i=1; $i<=10; $i++) {
    echo "<tr>";

    for($k=1; $k<=10; $k++) {
        $erg = $i * $k;
        echo "<td align='center'> $erg </td>";
    }

    echo "</tr>";
}
?>
