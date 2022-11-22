// formular_mit_checkbox.php
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Beispielformular</title>
</head>
<body>
<?php
if (!isset($_GET["vorname"])) {
    ?>
    <form action="<?php echo
    htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
        Ihr Vorname: <br />
        <input type="text" name="vorname" size="20" maxlength="30" />
        <br />
        Ihr Nachname: <br />
        <input type="text" name="nachname" size="20" maxlength="30" />
        <br />
        E-Mail: <br />
        <input type="text" name="email" size="20" maxlength="30" />
        <br />
        Telefon: <br />
        <input type="text" name="telefon" size="20" maxlength="30" />
        <br />
        Interessengebiete: <br />
        <input type="checkbox" name="thema[]" value="HTML" />HTML
        <input type="checkbox" name="thema[]" value="CSS" />CSS
        <input type="checkbox" name="thema[]" value="JavaScript"
        />JavaScript
        <input type="checkbox" name="thema[]" value="PHP" />PHP<br />
        <input type="submit" value="Abschicken" />
    </form>
    <?php
} else {
    echo "Ihre Eingaben<br />\n"
        . "Vorname: " . htmlspecialchars($_GET["vorname"])
        . "<br />\n Name: " . htmlspecialchars($_GET["nachname"])
        . "<br />\n E-Mail: " . htmlspecialchars($_GET["email"])
        . "<br />\n Telefon: " . htmlspecialchars($_GET["telefon"])
        . "<br />\n";
    if (isset($_GET["thema"]) && is_array($_GET["thema"])){
        echo "Die gewählten Themen: <br />\n ";
        echo "<ul>\n";
        foreach($_GET["thema"] as $th) {
            echo "<li>" . htmlspecialchars($th) . "</li>\n";
        }
        echo "</ul>\n";
    }
}
?>
</body>
</html>