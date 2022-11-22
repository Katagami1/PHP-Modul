<html>
<body>
<?php

if(!file_exists("u_schreiben.txt")){
    echo"Datei konnte nicht geöffnet werden";
}

$fp = @fopen("u_schreiben.txt", "r");
if(!$fp){
    echo"Datei konnte nicht zum Lesen geöffnet werden!";
}
$fpa = @fopen("u_schreiben_a.txt", "w");
$fpb = @fopen("u_schreiben_b.txt", "w");
$datensaetze = 0;
$fpazaehler = 0;
$fpbzaehler = 0;

while(!feof($fp)){
    $nr = fgets($fp);
    $vn = fgets($fp);
    $nn = fgets($fp);
    $datensaetze += 1;
    if($nr<1000){
        $fpazaehler += 1;
        fputs($fpa, "$nr$vn$nn");
    } else {
        $fpbzaehler += 1;
        fputs($fpb, "$nr$vn$nn");
    }
}
fclose($fp);
fclose($fpa);
fclose($fpb);

echo "Es wurden $datensaetze Datensätze gefunden.\n$fpazaehler Datensätze wurden in die Datei u_schreiben_a.txt geschrieben
und $fpbzaehler Datensätze in die Datei u_schreiben_b.txt geschrieben";
?>
</body>
</html>
