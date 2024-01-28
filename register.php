<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">

    <title>Registrierung</title>

    <style>

        body {

            font-family: 'Open Sans', sans-serif;

            background-color: #f4f4f4;

            margin: 0;

            padding: 0;

        }

        h1 {

            color: #3498db;

        }

        h2 {

            color: #3498db;

        }

        h3 {

            color: red;

        }

        form {

            width: 300px;

            margin: 20px auto;

        }

        input {

            padding: 10px;

            margin-bottom: 10px;

            width: 100%;

        }

        input[type="submit"] {

            background-color: #3498db;

            color: #ffffff;

            border: none;

            padding: 10px;

            cursor: pointer;

        }

        a {

            color: #3498db;

            text-decoration: none;

            display: block;

            margin-top: 10px;

        }

    </style>

</head>

<body>

<h1 style="text-align: center">Willkommen bei The Topic</h1>

<?php

if (isset($_GET["error1"])) {

    echo "<h3>Die Passwörter stimmen nicht überein.</h3>";

} else if (isset($_GET["error2"])) {

    echo "<h3>Benutzername bereits vergeben.</h3>";

}

?>

<form method="post" action="?register">

    <input type="text" id="firstname" name="firstname" placeholder="Vorname" required><br>

    <input type="text" id="lastname" name="lastname" placeholder="Nachname" required><br>

    <input type="text" id="username" name="username" placeholder="Username" required><br>

    <input type="password" id="pw" name="pw" placeholder="Passwort" required><br>

    <input type="password" id="pw-again" name="pw-again" placeholder="Passwort wiederholen" required><br>

    <input type="submit">

    <a href='login.php'>Du hast schon einen Account? Hier geht es zum Login!</a>

    <a href='index.php'>Zurück zum Forumsüberblick</a>

</form>

</body>

</html>
