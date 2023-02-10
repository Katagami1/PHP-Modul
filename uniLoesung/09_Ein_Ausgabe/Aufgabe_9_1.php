<html>
<body>
<?php
if(!file_exists("u_lesen.txt"))
    exit("Datei konnte nicht gefunden werden");
    
    $fp = @fopen("u_lesen.txt","r");
    if(!$fp)
        exit("Datei konnte nicht geöffnet werden");
        
        echo "<table border='1'>";
        echo "<tr> <td>Nummer</td> <td>Nachname</td> <td>Vorname</td> </tr>";
        $nr = 0;
        
        while (!feof($fp))
        {
            $vn = fgets($fp, 100);
            $nn = fgets($fp, 100);
            $nr = $nr + 1;
            echo "<tr> <td>$nr</td> <td>$nn</td> <td>$vn</td> </tr>";
        }
        
        echo "</table>";
        fclose($fp);
        ?>
</body>
</html>
