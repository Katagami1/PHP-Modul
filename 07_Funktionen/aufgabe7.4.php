<?php

$datei ="blume.jpg";
if (preg_match("/\.jpe?g$/", $datei)) {
    echo "passt";
}

echo"Sehen wir uns das Muster noch einmal genau an:
/\.jpe?g$/
/ und / sind die Begrenzer.
• Am Anfang wird nach einem Punkt gesucht, der üblicherweise vor der Endung steht – denn
uns interessieren ja nur Dateien mit der Endung jpeg oder jpg. Wenn jpeg an einer anderen
Stelle steht, ist das für uns nicht relevant. Da der Punkt ein Sonderzeichen ist – er steht ja
normalerweise für ein beliebiges Zeichen – müssen wir ihn über \. maskieren.
• Dann folgen die Zeichen jpe, wobei das e fakultativ ist – was durch das Fragezeichen
gekennzeichnet wird (? steht für ein- oder keinmal.)
• Nach dem g steht das $-Zeichen, um zu kennzeichnen, dass unser String mit der angegebenen
Zeichenfolge enden muss."

?>
