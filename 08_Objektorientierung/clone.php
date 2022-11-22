<?php

class Beispiel {
    public $farbe;
    public function info() {
        echo "Farbe ist {$this->farbe}<br />\n";
    }
}
$obj1 = new Beispiel(); //Referenz
$obj2 = $obj1;
$obj1->farbe = "blau";
$obj1->info();
$obj2->info();
$obj3 = clone $obj1;
$obj1->farbe = "orange";
$obj3->info();
$obj2->info();

?>
