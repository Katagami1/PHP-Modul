<?php

class Kunde
{
    public $name;
    public function halloSagen()
    {
        echo "Hallo";
    }
}
$neuerKunde = new Kunde(); // auch erlaubt: new Kunde
$neuerKunde->name = "Anja";
$neuerKunde->halloSagen();
echo " ";
echo $neuerKunde->name; // Ausgabe: Hallo Anja

?>
