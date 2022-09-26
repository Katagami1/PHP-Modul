<?php
$Artikel = array(22.5, 12.3, 5.2);
$Netto = array_sum($Artikel);
$brutto = $Netto * 1.19;
echo "Artikel 1: {$Artikel[0]} Euro </br>";
echo "Artikel 2: {$Artikel[1]} Euro </br>";
echo "Artikel 3: {$Artikel[2]} Euro </br></br>";
echo "Nettosumme: {$Netto} </br>";
echo "Mehrwehrsteuer: 19% </br>";
echo "Bruttosumme: {$brutto} </br>";