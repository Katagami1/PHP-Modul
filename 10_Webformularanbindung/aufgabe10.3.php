<html>
<body>
<form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
Nettowert: <br/>
        <input type="text" name="netto" maxlength="30">
MWSt. -Satz:
        <select name="mwstSatz">
            <option value="7">7%</option>
            <option value="19">19%</option>
        </select> <br/>
<input type="submit" value="Absenden">
    </form>
<?php

function brutto2($netto, $mwstSatz){
    return $netto * (100 + $mwstSatz) / 100;
}
if(!empty($_GET["netto"])){
    $wert = $_GET["netto"];
    $faktor = $_GET["mwstSatz"];
    $ergebnis = brutto2($wert, $faktor);
    echo "<br/> $wert ergibt $ergebnis brutto, bei einem MWST. von $faktor %";
}
?>
</body>
</html>