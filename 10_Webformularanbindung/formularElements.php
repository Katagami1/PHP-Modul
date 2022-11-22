<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
<input type="radio" name="anrede" value="Frau" /> Frau
<input type="radio" name="anrede" value="Herr" checked ="checked"/> Herr
<input type="radio" name="anrede" value="Firma" /> Firma <br />
Nachname: <br />
<input type="text" name="nachname" size="20" maxlength="30" />
<br />
Themen: <br />
<select name="thema">
<option value="HTML">HTML</option>
<option value="CSS">CSS</option>
  <option value="JavaScript">JavaScript</option>
<option value="PHP">PHP</option>
</select>
<br />
    Checkboxen <br/>
    <input type="checkbox" name="thema2[]" value="HTML" /> HTML
    <input type="checkbox" name="thema2[]" value="CSS" /> CSS
    <input type="checkbox" name="thema2[]" value="JavaScript" /> JavaScript
    <input type="checkbox" name="thema2[]" value="PHP" /> PHP
Kommentar: <br />
<textarea name="kommentar" rows="5" cols="20"></textarea>
<br />
<input type="submit" value="Abschicken" />
</form>
<?php
if (!empty($_GET["nachname"])) {
    echo "Ihre Eingaben<br />\n";
if (!empty($_GET["anrede"])) {
         echo htmlspecialchars($_GET["anrede"]);
}
 echo " " . htmlspecialchars($_GET["nachname"]) . "<br />\n";
 if (!empty($_GET["thema"])){
        echo "Das gewählte Thema: ". htmlspecialchars($_GET["thema"]) .
            "<br />\n ";
}
 if(isset($_GET["thema2"]) && is_array($_GET["thema2"])) {
     echo "Die gewählten Themen: <br/>\n";
     foreach ($_GET["thema2"] as $th) {
         echo htmlspecialchars($th) . "<br/> \n";
     }
 }
 if (!empty($_GET["kommentar"])) {
         echo "Ihr Kommentar: " . htmlspecialchars($_GET["kommentar"]);
}
 }
 ?>
