<?php

class Fahrzeug
{
    public $hersteller;
    public $farbe;
    public function __construct($farbe, $hersteller)
    {
        $this->farbe=$farbe;
        $this->hersteller = $hersteller;
    }
    public function starten()
    {
        echo "gestartet<br />\n";
    }
    public function stoppen()
    {
        echo "gestoppt<br />\n";
    }
}

class Auto extends Fahrzeug{
    private $kmStand;
    public function __construct($farbe, $hersteller, $kmStand)
    {
        parent::__construct($farbe, $hersteller);
        $this->kmStand = $kmStand;
    }

    function fahren($km){
        $this->kmStand += $km;
        echo "Aktueller Kilometerstand:  $this->kmStand.<br>";
    }
}

$f = new Auto("grau", "Ford", "22");
$f->starten();
$f->fahren(50);
$f->stoppen();

?>
