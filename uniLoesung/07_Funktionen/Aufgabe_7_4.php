<?php
$datei ="bild.jpeg";
if (preg_match("/\.jpe?g$/", $datei)) 
    echo "passt";
    
else echo "falsche Eingabe";

?>