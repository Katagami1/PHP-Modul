<?php

class Math{
    public static function wurzel($a){
        return sqrt($a);
    }
    public static function absolut($a){
        return abs($a);
    }
}
echo Math::wurzel(9);
echo "<br>";
echo Math::absolut(-54); // :: Operator erlaubt den Zugriff auf Konstanten und auf statischen Methoden


?>