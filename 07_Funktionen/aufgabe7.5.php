<?php

date_default_timezone_set("Europe/Berlin");
$tag = date("w");
if($tag == 0 || $tag == 6) {
    echo "Schönes Wochenende";
}
else{
    echo "Gute Woche";
}

?>