<?php
    session_start();
    setcookie("eingeloggt", "false");
    setcookie("benutzername", "");
    header("Location: login.php?logged-out");