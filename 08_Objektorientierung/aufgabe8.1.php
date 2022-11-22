<?php

class Auto{
    public $farbe;
    public $hersteller;
    public function autoStarten(){
        echo"Starten";
    }
    public function autoStoppen(){
        echo"<br>Stoppen";
    }
}

$neuesAuto = new Auto();
$neuesAuto->farbe = "Rot";
$neuesAuto->hersteller = "Ford";
$neuesAuto->autoStarten();
$neuesAuto->autoStoppen();

?>
