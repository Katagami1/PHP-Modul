<?php
    session_start();
    #Cookie wird auf false gesetzt => ausgeloggt
    setcookie("eingeloggt", "false");
    setcookie("benutzername", "");
    header("Location: login.php?logged-out");
    ?>