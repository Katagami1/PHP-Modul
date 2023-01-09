
<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    $showData = false;
    $showUpdateData = false;
    $username =  $_COOKIE["username"];
    $status = "";

    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "database");
    $query = mysqli_query($con, "select age, sex, weight from `database`.member where username = '$username';");

    $entry = mysqli_fetch_array($query);

    foreach ($entry as $key) {
        if (empty($key) or $key == 0) {
            $showUpdateData = true;
            $showData = false;
            $status = "Es sind noch keine Daten eingetragen. Update Dein Profil.<br><br>";
        }
    }

    if (!isset($_COOKIE["loggedin"]) or $_COOKIE["loggedin"] == "false" or $_COOKIE["username"] == "") {
        header("Location: login.php?loggedin=false");
    }

    if(isset($_GET['logout'])) {
        setcookie("loggedin", "false", time()+7200);
    }

    #--------------------------------------

    $con = mysqli_connect("localhost","root");
    mysqli_select_db($con, "database");

    $query = mysqli_query($con, "select firstname from `database`.user where username = '$username' limit 1;");
    $entriesFound = mysqli_num_rows($query);

    if($entriesFound != 1) {
        header("Location: login.php?loggedin=false");
    }

    $entry = mysqli_fetch_array($query);

    foreach($entry as $key) {
        $firstname = $key;
    }

    #--------------------------------------

    if(isset($_GET["show"])) {
        $showData = true;
        $query = mysqli_query($con, "select age, sex, weight from `database`.member where username = '$username' limit 1;");
        $entry = mysqli_fetch_array($query);

        foreach ($entry as $key) {
            if (empty($key) or $key == 0) {
                $showUpdateData = true;
                $showData = false;
                header("Location: index.php?message=precheck");
            }
        }

        $age = $entry["age"];
        $sex =  $entry["sex"];
        $weight = $entry["weight"];

        if ($sex == "m") {
            $sex = "Männlich";
        } else if($sex == "w") {
            $sex = "Weiblich";
        } else if ($sex == "d") {
            $sex = "Divers";
        }
    }
    #--------------------------------------

    if(isset($_GET["update"])) {
        if (empty($_POST['age']) or empty($_POST['weight']) or empty($_POST['sex'])) {
            $showUpdateData = true;
            $status = "Trage Deine Daten ein.";
        } else {
            $showUpdateData = false;
            $showData = false;
            $status = "Deine Daten wurden erfolgreich geupdated. <br><br>";
            $updated_age = $_POST['age'];
            $updated_weight = $_POST['weight'];
            $updated_sex = $_POST['sex'];

            mysqli_query($con, "UPDATE `database`.member SET age = $updated_age, weight = $updated_weight, sex = '$updated_sex' WHERE username = '$username'");
        }
    }
?>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>BST Lifestyle - Member Area</title>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li><a href="forum.php">Forum</a></li>
            </ul>
            <ul>
                <li><a href="index.php">Startseite</a></li>
            </ul>
            <br>
            <br>
            <div class="logout-button">
                <a href="login.php">
                    <button>Log out</button>
                </a>
            </div>
            <div class="date">
                <span id="clock" class="clock" style="padding: 0 0 3px 0"></span>
            </div>
        </div>
        <div class="main-body">
            <div class="welcome-text">
                <span><?php echo "<h1>Hallo $firstname, schön Dich zu sehen. </h1>";?> </span>
            </div>
            <span style="color: red;"><?php echo $status?></span>
            <div class="choose-action">
                <form action="?show" method="post">
                    <?php
                    if (!$showData and !$showUpdateData) {
                        echo '<label>Persönliche Daten anzeigen: </label>
                              <input type="submit">
                              ';
                    }
                    if ($showData) {
                        echo "<label>Deine Daten:</label> <br>
                              <ul><li>Alter: $age Jahre</ul>
                              <ul><li>Gewicht: $weight kg</ul>
                              <ul><li>Geschlecht: $sex </ul>
                              ";
                    }
                    ?>
                </form>
                <form action="?update" method="post">
                    <?php
                    if (!$showUpdateData) {
                        echo '<label>Persönliche Daten updaten: </label> 
                              <input type="submit">
                              ';
                    }
                    if ($showUpdateData) {
                        echo '<input type="number" name="age" id="age" placeholder="Alter" maxlength="3" required>
                              <input type="text" name="sex" id="sex" placeholder="Geschlecht (m/w/d)" maxlength="1" required>
                              <input type="number" name="weight" id="weight" placeholder="Gewicht" maxlength="3" required>
                              <input type="submit">
                              ';
                    }
                    ?>
                </form>
            </div>
    </body>
    <style>
        .navbar{
            border-bottom: 1px black solid;
            width: 100%;
        }

        .date {
            text-align: right;
            vertical-align: middle;
            padding: 10px 20px 0 5px;
            font-size: 20px
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