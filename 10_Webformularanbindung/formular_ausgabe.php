<html>
<body>
<form>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "get">
Ihr Vorname: <br/>
<input type ="text" name ="vorname" size="20" maxlength="30" />
<br/>
Ihr Nachname: <br/>
<input type="text" name="nachname" size="20" maxlength="30" />
<br/>
E-Mail: <br/>
<input type="text" email="E-Mail" size = "25" maxlength="50" />
<br/>
Telefon: <br/>
<input type="text" nummer="Telefonnummer" size ="20" maxlength="20 />"
<br/>
<input type="submit" value="Abschicken" />
</form>
    <?php
    if(isset($_GET["vorname"])) {
        echo "Ihre Eingaben<br/>\n";
        echo "Vorname: " . htmlspecialchars($_GET["vorname"]) . "<br/>\n";
        echo "Name: " . htmlspecialchars($_GET["nachname"]) . "<br/>\n";
        echo "E-Mail: " . htmlspecialchars($_GET["email"]) . "<br/>\n";
        echo "Telefon: " . htmlspecialchars($_GET["telefon"]) . "<br/>\n";
        echo "htmlspecialchars() wandelt Sonderzeichen in HTML-Codes um!";
    }
    ?>

</body>
</html>
