<?php
interface Fahrbar {
    function rollen();
    function reifenwechseln();
}
interface Schwimmfaehig {
    function anlegen();
    function kentern();
}
class AmphiCar implements Fahrbar, Schwimmfaehig {
    function rollen() {
        echo "Es rollt<br />";
    }
    function reifenwechseln() {
        echo "Es werden Reifen gewechselt<br />";
    }
    function anlegen() {
        echo "Es legt an<br />";
    }
    function kentern() {
        echo "Es kentert<br />";
    }
    function fahren() {
        echo "Es fährt<br />";
    }
}
$VwTyp166 = new AmphiCar();
$VwTyp166->rollen();
$VwTyp166->reifenwechseln();
$VwTyp166->fahren();
$VwTyp166->kentern();
$VwTyp166->anlegen();
?>