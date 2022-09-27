<html>
<body>
<?php
$p1 = 0;
$p2 = 0;
while($p1 < 25 && $p2 < 25){
    $p1 += rand(1, 6);;
    echo "p1: $p1 <br/>";
    $p2 += rand(1, 6);;
    echo "p2: $p2  <br/>";
}
if($p1 > $p2){
    echo "<p> Player 1 wins </p>";
    }
    else if($p1 < $p2){
        echo "<p> Player 2 wins </p>";
    }
    else
        echo "<p> Unentschieden </p>";
?>

</body>
</html>
