<!DOCTYPE html>
<html lang="en">
<html>
<body>
<?php
$user=$_POST['user'];
$mail=$_POST['mail'];
$betreff=$_POST['betreff'];
$forumsbeitrag=$_POST['forumsbeitrag'];
$geschlecht=$_POST['geschlecht'];
$alter=$_POST['alter'];
$gewicht=$_POST['gewicht'];




mysqli_query($db,$anfrage)
or die ("<b>Fehler bei der Datenbankanfrage</b>");
mysqli_close($db);
print ("<p>Vielen Dank für Ihren Beitrag!</p>");
print ("<a href='index.php'>Zurück zum Forumsüberblick</a>");

?>
</body></html>
