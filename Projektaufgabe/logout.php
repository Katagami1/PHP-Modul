<?php
    setcookie("loggedin", "false", time()+7200);
    echo "Erfolgreich cookie set";
    header('Location: index.php');
    exit;

