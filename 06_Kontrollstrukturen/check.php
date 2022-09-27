// Das zu erweiternde Programm
<?php
date_default_timezone_set("Europe/Berlin");
$uhrzeit = date("H");
if ($uhrzeit < 5 || $uhrzeit > 20) {
    $gruss = "Gute Nacht";
    $hg = "#2596be";
} elseif ($uhrzeit < 11) {
    $gruss = "Guten Morgen";
    $hg = "#32a852";
} elseif ($uhrzeit < 15) {
    $gruss = "Guten Mittag";
    $hg = "#9ba832";
} elseif ($uhrzeit < 18) {
    $gruss = "Guten Nachmittag";
    $hg = "#7b32a8";
} else {
    $gruss = "Guten Abend";
    $hg = "#59545c";
}
?>

// Fortsetzung
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Unterschiedliche Begrüßung</title>
</head>
<style>
    body {
        background-color: <?php echo $hg; ?>;
    }
</style>
<body>
<?php
echo $gruss;
?>
</body>
</html>
