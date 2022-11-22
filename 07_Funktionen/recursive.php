<?php
function recursiveFunction($a){
    if($a <= 20){
        echo "$a\n";
        recursiveFunction($a + 1);
    }
}
$lel = 5;
recursiveFunction($lel);
?>