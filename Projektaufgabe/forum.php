
<?php
    #error_reporting(E_ERROR | E_PARSE);
    session_start();
    $loggedIn = false;
    $status = "";
    $con = mysqli_connect("localhost","root");

    if(isset($_GET['logout'])) {
        setcookie("loggedin", "false", time()+7200);
        header("Location: index.php");
    }

    if ($_COOKIE["loggedin"] == "true") {
        $loggedIn = true;
        $username = $_COOKIE["username"];
    }

    if(isset($_GET["category-feld-blank"])) {
        $status = "Bitte gebe einen Kategorienamen ein!";
    } else if(isset($_GET["categoryname-already-exists"])) {
        $status = "Der Name ist bereits vergeben. Wählen einen neuen aus.";
    } else if(isset($_GET["success"])) {
        $status = "Kategorie erfolgreich angelegt.";
        header("Refresh");
    }

    mysqli_select_db($con, "database");

    $query = mysqli_query($con, "select categoryName from `database`.category;");

    $categories = mysqli_fetch_array($query);
    $categoriesCount = mysqli_num_rows($query);

    if (isset($_GET["add-category"])) {
        $categoryName = $_POST["categoryName"];
        if (empty($categoryName) or $categoryName == "") {
            header("Location: forum.php?category-feld-blank");
            return;
        }
        $query = mysqli_query($con, "select * from category where categoryName = '$categoryName';");
        $categoryWithSameName = mysqli_num_rows($query);

        if($categoryWithSameName != 0) {
            header("Location: forum.php?categoryname-already-exists");
            return;
        }

        $query = mysqli_query($con, "insert into category value ('$categoryName', '$username');");
        header("Location: forum.php?success");
    }
    ?>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>BST Lifestyle - Forum</title>
    </head>
    <body>
        <div class="navbar">
            <ul>
                <li>
                    <a href="index.php">Member Area</a>
                    <br>
                    <br>
                </li>
            </ul>
            <div>
                <?php
                    if (!$loggedIn) {
                        echo /** @lang text */
                        '<a href="login.php?ref=forum">
                              <button>Log in</button>
                              </a>';
                    } else {
                        echo /** @lang text */
                        '<a href="login.php">
                            <button>Log out</button>
                            </a>';
                    }
                        ?>
            </div>
            <div class="date">
                <span id="clock" class="clock" style="padding: 0 0 3px 0"></span>
            </div>
        </div>
        <div class="forum-block">
            <h2>
                Themenbereiche:
            </h2>
            <div class="new-category">
                    <?php
                        if ($categoriesCount == 0) {
                            echo "<h4>Es sind noch keine Kategorien angelegt.</h4>"; ?>
                                <form method="post" action="?add-category">
                                    <?php
                                        if($loggedIn) {
                                            echo
                                                /** @lang text */
                                            "<label><br><br>Lege eine neue Kategorie an: <br><br></label>    
                                              <input type='text' placeholder='Kategoriename' name='categoryName' id='categoryName'>
                                              <input type='submit'>";
                                        } else {
                                            echo /** @lang text */ "<a href='login.php?ref=forum'>Logge Dich ein</a>, um eine neue Kategorie anzulegen.";
                                        }
                                    ?>
                                </form>
                                <?php
                        } else {

                            $count = 0;
                            $query = mysqli_query($con, "select categoryName from `database`.category ORDER BY categoryName;");
                            $categoriesCount = mysqli_num_rows($query);
                            $categories = mysqli_fetch_array($query);

                            echo $categoriesCount . "<br><br>";

                            foreach($categories as $key => $value) {
                                echo "<br>" . $key . ": <br> " .$value;
                            }

                            echo '<br><br><span style="color: red;">'; echo $status . '</span>';
                            ?>
                            <form method="post" action="?add-category">
                                <?php
                                    if($loggedIn) {
                                        echo
                                        "<label><br><br>Lege eine weitere Kategorie an: <br><br></label>    
                                          <input type='text' placeholder='Kategoriename' name='categoryName' id='categoryName'>
                                          <input type='submit'>";
                                    } else {
                                        echo "<a href='login.php?ref=forum'>Logge Dich ein</a>, um eine neue Kategorie anzulegen.";
                                    }
                        }
                            ?>
                </form>
            </div>
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
