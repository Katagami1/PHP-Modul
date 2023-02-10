<?php
$bilder = array(
    array("pfad" => "blumen.jpg",
        "alt" => "rote Blumen",
        "titel" => "Strau� aus roten Blumen"),
    array("pfad" => "landschaft.jpg",
        "alt" => "Landschaft",
        "titel" => "Landschaft im Nebel"),
    array("pfad" => "stadt_am_meer.jpg",
        "alt" => "H�user",
        "titel" => "Griechische H�user am Abend"),
    array("pfad" => "strand.jpg",
        "alt" => "Strand",
        "titel" => "Strand mit Bergen"),
    array("pfad" => "boot.jpg",
        "alt" => "Boot",
        "titel" => "Boot auf einem Felsen")
);

echo $bilder[0]["pfad"];     // blumen.jpg
echo $bilder[0][0];         // Notice: Undefined offset: 0 in 

?>