<?php
$artikel1 = 22.5;
$artikel2 = 12.3;
$artikel3 = 5.2;

$nettosumme = $artikel1 + $artikel2 + $artikel3;
$umsatzsteuer = 1.19;
$bruttosumme = $nettosumme * $umsatzsteuer;

echo "Artikel 1: ". $artikel1  . " Euro<br>Artikel 2: " . $artikel2 . " Euro<br>Artikel 3: ".$artikel3 . " Euro<br>Nettosumme: " . $nettosumme . " Euro<br> Bruttosumme: " .$bruttosumme . " Euro";

#echo $artikel2;
#echo $artikel1;
#echo $artikel3;
#echo $nettosumme;
#echo $bruttosumme;