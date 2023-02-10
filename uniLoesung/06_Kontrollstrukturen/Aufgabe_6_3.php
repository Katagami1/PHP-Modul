<html>
<body>
<?php
/* Initialisierung */

$spieler1 = 0;
$spieler2 = 0;

/* Spiel */
echo "<table border='1'>";
echo "<tr><td>Spieler   1</td><td>Spieler 2</td></tr>";
while ($spieler1 < 25 && $spieler2 < 25)
{
    $spieler1 = $spieler1 + rand(1,6);
    $spieler2 = $spieler2 + rand(1,6);
    echo "<tr><td align='right'>$spieler1</td>"
    . "<td align='right'>$spieler2</td></tr>";
}
echo "</table>";

/* Ende */
if ($spieler1 > $spieler2)
    echo "<p>Spieler 1 hat gewonnen</p>";
    else if ($spieler1 < $spieler2)
        echo "<p>Spieler 2 hat gewonnen</p>";
        else
            echo "<p>Unentschieden</p>";
            
            ?>
</body>
</html>
