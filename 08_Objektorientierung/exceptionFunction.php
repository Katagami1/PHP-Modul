<?php

function teilen($x){
    if($x == 0){
        throw new Exception("Teilen durch 0!");
    } else {
        return 1/$x;
    }
}
try {
    echo teilen(4) . "<br/>\n";
    echo teilen(0) . "<br/>\n";
    echo teilen(5) . "<br/>\n";
} catch (Exception $e){
    echo "Excepction gefangen: " . $e->getMessage() . "<br/>>\n";
}

function teilen2($x){
    if (!is_numeric($x)){
        throw new Exception("keine Zahl", 1);
    } elseif ($x == 0) {
        throw new Exception("Teilen durch 0! ", 2);
    } else {
        return 1/$x;
    }
}
try {
    echo teilen2(4) . "<br />\n";
    echo teilen2("hallo") . "<br />\n";
} catch (Exception $e) {
    if ($e->getCode() == 2) {
        echo "Falscher Wert: " . $e->getMessage();
    } elseif ($e->getCode() == 1) {
        echo "Falscher Datentyp: " . $e->getMessage();
    }
}
?>
