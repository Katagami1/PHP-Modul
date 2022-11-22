<?php

$fp = @fopen("schreiben.txt", "w");
if(!$fp){
    exit("Die Datei konnte nicht zum Schreiben geöffnet werden!");
}
fputs($fp, "Max Mustermann\n");

$a = 10;
for($i=10; $i<=50; $i+=10){
    fputs($fp, "Zeile " . $i/$a . ": " .$i ."\n");
}
fputs($fp, "Autor: Max Maier", 8); // A = 0 => M = 7 => 8 Zeichen
echo"Ausgabe in Datei geschrieben";
fclose($fp);
echo"\nAusgabe über readfile()<br/>\n";

if(!file_exists("schreiben.txt")){
    exit("Datei konnte nicht gefunden werden!");
}
$fp = @fopen("schreiben.txt","r");
if(!$fp){
    exit("Datei konnte nicht geöffnet werden!");
}
$i = 1;
echo"Ausgabe über while-schleife <br/>\n";
while(!feof($fp)){ // feof() zeigt das Ende einer Datei an
    $zeile = fgets($fp, 100);
    echo "Zeile $i: $zeile <br/>\n";
    $i++;
}

fclose($fp);
echo"\nAusgabe über readfile()<br/>\n";
readfile("schreiben.txt");
echo "\nAusgabe über file()<br/>\n";
echo "<br/>\n";
$dfeld = file("schreiben.txt");
for($i=0; $i<count($dfeld); $i++)
    echo $dfeld[$i] . "<br />";
?>
