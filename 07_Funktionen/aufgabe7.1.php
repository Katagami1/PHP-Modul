<?php
function vermerk($vorname, $nachname, $abteilung){
    echo "<br/>";
    echo "Programmteil von $vorname $nachname, $abteilung <br/>";
    $email = sprintf("%s.%s@%s.phpdevel.de", $vorname, $nachname, $abteilung);
    echo "E-Mail : $vorname.$nachname@$abteilung.phpdevel.de <br/>"; // ist das gleiche wie line 5
    echo "$email <br/>";
}
vermerk("Jordan","Zeng","FCSD");
vermerk("Baris","Salcan","Enterprise Connectivity");
vermerk("Pringles","Cewe","PlayTheHype");

?>