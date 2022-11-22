<?php

if(!file_exists("lesen.txt")){
    exit("Datei konnte nihct gefunden werden!");
}
$fp = @fopen("lesen.txt", "r"); // Silence Operator @ bedeutet keine Fehlermeldung ausgeben

if(!$fp){
    exit("Datei konnte nicht geöffnet werden!");
}
$zeile = fgets($fp, 100);
echo "Silence Operator @ bedeutet keine Fehlermeldung ausgeben \n Inhalt der ersten Zeile der Datei lesen.txt: </br> $zeile";
fclose($fp);
?>
