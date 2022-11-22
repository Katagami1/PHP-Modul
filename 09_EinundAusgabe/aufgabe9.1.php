<html>
<body>
<?php

if(!file_exists("u_lesen.txt")){
    echo"Datei existiert nicht!";
}
$fp = @fopen("u_lesen.txt", "r");
if(!$fp){
    echo "Datei konnte nicht geöffnet werden!";
}

echo "<table border ='1'>";
$dfeld = file("u_lesen.txt");

echo"<tr>";
echo"<td>Nummer</td> <td>Nachname</td> <td>Vorname</td>";
echo"</tr>";

$nummer = 0;

for($i=0; $i<count($dfeld); $i+=2) {
$nummer +=1;
    echo "<tr>";
    echo "<td>$nummer</td> <td>$dfeld[$i]</td>" . "<td>".$dfeld[$i+1] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>

