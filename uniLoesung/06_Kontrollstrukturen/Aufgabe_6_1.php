<?php
    date_default_timezone_set("Europe/Berlin");
    $uhrzeit = date("H");
    if ($uhrzeit < 5 || $uhrzeit > 20) {
        $gruss = "Gute Nacht";
        $hg = "#886CEA";
    } elseif ($uhrzeit < 11) {
        $gruss = "Guten Morgen";
        $hg = "#66EDF0";
    } elseif ($uhrzeit < 15) {
        $gruss = "Guten Mittag";
        $hg = "#D1F066";
    } elseif ($uhrzeit < 18) {
        $gruss = "Guten Nachmittag";
        $hg = "#F09366";
    } else {
        $gruss = "Guten Abend";
        $hg = "#F066DF";
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <meta charset="UTF-8" />
 <title>Unterschiedliche Begrüßung </title>
 <style>
 body {
     background-color: <?php echo $hg; ?>;
 }
 </style>
 </head>
 <body>
    <?php
       echo $gruss;
    ?>
 </body> </html>

