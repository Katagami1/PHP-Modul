<?php

echo "Ihre Eingaben<br/>\n";
echo "Vorname: " . htmlspecialchars($_GET['vorname']) . "<br/>\n";
echo "Name: " . htmlspecialchars($_GET['nachname']) . "<br/>\n";
echo "E-Mail: " . htmlspecialchars($_GET['email']) . "<br/>\n";
echo "Telefon: " . htmlspecialchars($_GET['telefon']) . "<br/>\n";
echo "htmlspecialchars() wandelt Sonderzeichen in HTML-Codes um!";
?>
