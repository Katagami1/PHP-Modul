
<?php
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        $refFromForum = false;

        setcookie("loggedin", "false", time()+7200);

        if(!empty($_GET['loggedin'])) {
            $status = "Logge Dich erst ein, um auf die Seite zugreifen zu können.<br><br>";
        } else if ($_GET["message"] == "empty-fields"){
            $status = "Bitte fülle alle Felder aus! <br><br>";
        } else if($_GET["message"] == "success-registration") {
            $status = "Erfolgreich registriert. Du kannst Dich nun einloggen.<br><br>";
        } else if($_GET["ref"] == "forum") {
            $refFromForum = true;
        }

        if(isset($_GET['login'])) {
            $username = $_POST['username'];
            $passwort = $_POST['passwort'];

            if(empty($username) or empty($passwort)) {
                header("Location: login.php?message=empty-fields");
            }

            $con = mysqli_connect("localhost","root");
            mysqli_select_db($con, "database");

            $query = mysqli_query($con, "select * from `database`.user where username = '$username' and password = '$passwort';");
            $entriesFound = mysqli_num_rows($query);

            if ($entriesFound != 1) {
                $status =  "Die Kombination aus Benutzername und Passwort konnte nicht gefunden werden. <br><br>";
                setcookie("loggedin", "false", time()+7200);
                setcookie("username", "", time()+7200);
            } else {
                setcookie("loggedin", "true", time()+7200);
                setcookie("username", "$username", time()+7200);
                if ($refFromForum) {
                    header("Location: forum.php");
                    return;
                } else {
                    header("Location: index.php?message=precheck");
                }
            }
        }
    ?>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>BST Lifestyle - Login</title>
    </head>
    <body onload="updateTime()">
        <div class="navbar">
            <ul>
                <li><a href="forum.php">Forum</a></li>
            </ul>
            <ul>
                <li><a href="index.php">Startseite</a></li>
            </ul>
            <div class="date">
                <span id="clock" class="clock" style="padding: 0 0 3px 0"></span>
            </div>
        </div>
        <div class="login-box">
            <form action="?login" method="post">
                <h3 class="login-caption">
                    Logge Dich ein, um Deinen persönlichen Bereich zu sehen.
                </h3>
                <input type="text" id="username" minlength="6" name="username" placeholder="Benutzername" value="<?php echo $username_from_registration; ?>" class="username-field"><br><br>
                <input id="passwort" minlength='6' name="passwort" placeholder="Passwort" type="password" class="password-field"><br><br>
                <input type="submit" placeholder="Einloggen">
            </form>
            <span class="status-text"><?php echo $status ?></span>
            <label>Noch keinen Account? </label><a href="register.php"><button>Registrieren</button></a>
        </div>
    </body>
    <style>
        .status-text {
            color: red;
            font-size: 15px;
            padding: 5px 5px 5px 5px;
        }

        .navbar{
            border-bottom: 1px black solid;
            width: 100%;
        }

        .login-caption {
            font-size: 15px;
        }
        .date {
            text-align: right;
            vertical-align: middle;
            padding: 10px 20px 0 5px;
            font-size: 20px
        }

        .login-box {
            text-align: center;
            width: 30%;
            margin: 30px 0 0 35%;
            padding: 20px 20px 20px 20px;
            border: 1px black solid;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
    </style>
    <script>
        async function updateTime(){
            let currentTime = new Date()
            let hours = currentTime.getHours()
            let minutes = currentTime.getMinutes()
            let seconds = currentTime.getSeconds()
            if (hours < 10) {
                hours = "0" + hours
            }
            if (minutes < 10){
                minutes = "0" + minutes
            }
            if(seconds < 10) {
                seconds = "0" + seconds
            }
            document.getElementById('clock').innerHTML = hours + ":" + minutes + ":" + seconds;
        }
        setInterval(updateTime, 1000);
    </script>
</html>