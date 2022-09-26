<?php

$tage = array("Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag", "Sonntag");
foreach($tage as $tag){
    echo $tag."<br/>";
}

$spieler["Thomas"] = 30;
$spieler["Anna"] = 20;
$spieler["Sarah"] = 25;
foreach($spieler as $schluessel => $wert){
    echo $schluessel." hat " .$wert. " erreicht <br/>";
}
