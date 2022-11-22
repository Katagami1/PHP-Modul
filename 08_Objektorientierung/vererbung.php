<?php

class Fahrzeug {
    private $geschwindigkeit = 0;
    function beschleunigen($wert){
        $this->geschwindigkeit += wert;
    }
    function ausgabe(){
        echo "Geschwindigkeit: $this->geschwindigkeit <br>";
    }
}

class PKW extends Fahrzeug{
    private $insassen = 0;
    function einsteigen($anzahl){
        $this->insassen += $anzahl;
    }
    function aussteigen($anzahl){
        $this->insassen -= $anzahl;
    }
    function ausgabe()  // überschriebene Methode
    {
        echo "Insassen: $this->insassen ";
        parent::ausgabe(); // geerbte Methode
    }
}

?>
