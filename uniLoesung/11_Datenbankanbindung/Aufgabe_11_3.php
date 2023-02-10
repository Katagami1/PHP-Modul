<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

<p>Anzeige der Festplatten aus der gewählten Preisgruppe:</p>
<form action="u_db_radio.php" method="post">
    <p><input type="radio" name="pr" value="1" /> bis 120 &euro; einschl.<br/>
    <input type="radio" name="pr" value="2" checked="checked" /> ab 120 &euro; 
    ausschl. bis 140 &euro; einschl.<br />
    <input type="radio" name="pr" value="3" /> ab 140 &euro; ausschl.</p>
    <p><input type="checkbox" name="prsort" /> Ausgabe nach Preis (absteigend)
      sortiert</p>
    <p><input type="submit" />
    <input type="reset" /></p>
</form>
</body>
</html>

