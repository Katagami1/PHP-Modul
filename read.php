<!DOCTYPE html>

<html lang="en">

<head>

    <title>The Topic</title>

    <style>

        body {

            font-family: 'Open Sans', sans-serif;

            background-color: #f4f4f4;

            margin: 0;

            padding: 0;

        }

        h3 {

            color: #3498db;

        }

        div {

            width: 400px;

        }

        b {

            color: #3498db;

        }

        hr {

            border: 1px solid #3498db;

        }

        button {

            background-color: #3498db;

            color: #ffffff;

            padding: 10px;

            border: none;

            cursor: pointer;

            text-decoration: none;

            display: inline-block;

        }

        a {

            color: #3498db;

            text-decoration: none;

            display: inline-block;

            margin-top: 10px;

        }

    </style>

</head>

<body>

<h3>The Topic</h3>

<div>

    <?php

    session_start();

    error_reporting(E_ERROR | E_PARSE);

    $eingeloggt = false;

    $vorname = "";

    $nachname = "";

    $benutzername = $_COOKIE["benutzername"];

    $beitrags_id = 0;

    $kategoriename = "";

    $datum = 0;

    $uhrzeit = 0;

    $user = "";

    $betreff = "";

    $beitragstext = "";

    $db = mysqli_connect("localhost", "root");

    mysqli_select_db($db, "forum");

    if ($_COOKIE["eingeloggt"] == "true") {

        $eingeloggt = true;

    }

    ?>

    <?php

    $id = $_GET['beitrags_id'];

    $abfrage = mysqli_query($db, "select * from forum");

    # Ganze Selectabfrage wird in Array "$werte" reingeschrieben und Variablen = Datenbankvariablen

    foreach ($abfrage as $x => $werte) {

        $beitrags_id = $werte["beitrags_id"];

        $kategoriename = $werte["Kategoriename"];

        $user = $werte["user"];

        $datum = $werte["datum"];

        $uhrzeit = $werte["uhrzeit"];

        $betreff = $werte["betreff"];

        $beitragstext = $werte["beitragstext"];

    }

    # SQL Abfrage nach Beitragsid die wir aus URL erhalten haben

    $abfrage = mysqli_query($db, "select * from forum where beitrags_id LIKE '$id'");

    # Abfrage in Array, um auf einzelne Werte zuzugreifen

    $zeile = mysqli_fetch_row($abfrage);

    print ("<br><br><b>Kategorie: </b>");

    #Kategorie

    print($zeile[1]);

    print ("<br><b>Betreff: </b>");

    #Betreff

    print ($zeile[6]);

    print ("<br><b>von: </b>");

    #User

    print ($zeile[3]);

    print ("</a><br><b>Geschrieben am: </b>");

    #Datum

    print ($zeile[4]);

    print (" um ");

    # Uhrzeit

    print ($zeile[5]);

    print ("<br><br><hr><br><br>");

    # zeile[7] Beitragstext

    print ($zeile[7]);

    if ($eingeloggt) {

        print ("<br> <br> <br> <a href='reply.php?beitrags_id=$id'><button>Antworten</button></a>");

    } else {

        print ("<br> <br> <br> <a href='login.php'>Bitte melde dich an, um diesen Beitrag zu kommentieren!</a>");

    }

    mysqli_close($db);

    ?>

    <br> <br> <a href='index.php'>Zurück zum Forumsüberblick</a>

    <?php if ($eingeloggt) {

        print ("<br> <br> <br> <a href='logout.php'><button>Ausloggen</button></a>");

    } ?>

</div>

</body>

</html>
