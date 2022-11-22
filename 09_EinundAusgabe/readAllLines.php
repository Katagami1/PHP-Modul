<html>
<body>
<?php

if(!file_exists("lesen.txt")){
    exit("Datei konnte nicht gefunden werden!");
}
$fp = @fopen("lesen.txt","r");
if(!$fp){
    exit("Datei konnte nicht geöffnet werden!");
}
$i = 1;
echo"Ausgabe über while-schleife mit !feof (zeigt das Ende einer Datei an)<br/>\n";
while(!feof($fp)){
    $zeile = fgets($fp, 100);
    echo "Zeile $i: $zeile <br/>\n";
    $i++;
}

fclose($fp);
echo"\nAusgabe über readfile()<br/>\n";
readfile("lesen.txt");
echo "\nAusgabe über file()<br/>\n";
echo "<br/>\n";
$dfeld = file("lesen.txt");
for($i=0; $i<count($dfeld); $i++)
    echo $dfeld[$i] . "<br />";
?>
</body>
</html>
