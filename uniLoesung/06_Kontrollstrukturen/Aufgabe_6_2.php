<html>
<body>
<table border="1">
<?php
for ($z=1; $z<=10; $z++)
{
    echo "<tr>";
    for ($s=1; $s<=10; $s++)
    {
        $erg = $z * $s;
        echo "<td align='right'>$erg</td>";
    }
    echo "</tr>";
}
?>
</table>
</body>
</html>
