<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    setcookie("loggedin", "false", time()+7200);

    if($_GET["message"] == "empty-fields") {
        $status = "Bitte fülle alle Felder aus!<br><br>";
    } else if($_GET["message"] == "username-exists") {
        $status = "Der Benutzername ist bereits vergeben.<br><br>";
    } else if ($_GET["message"] == "passwords-not-matching") {
        $status = "Die eingegebenen Passwörter stimmen nicht über ein.<br><br>";
    } else {
        $status = "";
    }

    if(isset($_GET['register'])) {
        $firstname_array = $_POST['firstname'];
        $lastname_array = $_POST['lastname'];
        $username_array = $_POST['username'];
        $password_array = $_POST['password'];
        $password_array2 = $_POST['password2'];

        if (empty($firstname_array) or empty($lastname_array) or empty($username_array) or empty($password_array) or empty($password_array2)) {
            header("Location: register.php?message=empty-fields");
            return;
        } else if (!($password_array == $password_array2)) {
            header("Location: register.php?message=passwords-not-matching");
            return;
        }

        $con = mysqli_connect("localhost","root");
        mysqli_select_db($con, "database");

        $queryUser = mysqli_query($con, "select username from `database`.user where username = '$username_array';");
        $entriesFoundUsernameUser = mysqli_num_rows($queryUser);

        $queryMember = mysqli_query($con, "select username from `database`.member where username = '$username_array';");
        $entriesFoundUsernameMember = mysqli_num_rows($queryMember);

        if ($entriesFoundUsernameUser  !=  0 or $entriesFoundUsernameMember != 0) {
            header("Location: register.php?message=username-exists");
            return;
        }

        mysqli_query($con,
          "insert into `database`.user (username, firstname, lastname, password) 
                                 values ('$username_array', '$firstname_array', '$lastname_array', '$password_array');");

        mysqli_query($con,"insert into `database`.member (username, age, sex, weight)
                                                  values ('$username_array', '0', 'x', '0');");

        header("Location: login.php?message=success-registration");
    }
?>

<html>  
    <head>
        <meta charset="UTF-8">
        <title>BST Lifestyle</title>
    </head>
    <body onload="updateTime()">
    <div class="navbar">
        <ul>
            <li><a href="login.php">Home</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li><a href="index.php">Members Area - Registrieren</a></li>
        </ul>
        <div class="date">
            <span id="clock" class="clock" style="padding: 0 0 3px 0"></span>
        </div>
    </div>
    <div class="register-box">
        <form action="?register=1" method="post">
            <h3 class="login-caption">
                Willkommen bei BST Lifestyle, schön Dich zu sehen.
            </h3>
            <input type="text" id="firstname" name="firstname" placeholder="Vorname" class="firstname-field"> <br><br>
            <input type="text" id="lastname" name="lastname" placeholder="Nachname" class="lastname-field"> <br><br>
            <input type="text" id="username" minlength="6" name="username" placeholder="Benutzername" class="username-field"> <br><br>
            <input id="password" minlength='6' name="password" placeholder="Passwort" type="password" class="password-field"><br><br>
            <input id="password2" minlength='6' name="password2" placeholder="Passwort wiederholen" type="password" class="password2-field"><br><br>
            <input type="submit" placeholder="Registrieren">
        </form>
        <span class="status-text"><?php echo $status ?></span>
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
    
        .register-box {
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