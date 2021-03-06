<?php
    session_start();

    if (isset($_SESSION['users'])) {
        header("Location: game.php");
        exit();
    }

?>

<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Pioneers</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="timer.js"></script>
    </head>
    <body onload="timer();">
        <div class="menu">
            <ul id="menu-ul">
                <li><a href="./">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="hanger.php">Hanged Man</a></li>
                <li><a href="signup">Sign up</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="content">
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'] . "<br /><br />";
                unset($_SESSION['error']);
            }
            ?>
            <div id="clock"></div>
            <form action="zaloguj.php" method="post">

                <input type="text" name="login" placeholder="login" <?= isset($_SESSION['login']) ? 'value="' . $_SESSION['login'] . '"' : '' ?>/>

                <input type="password" name="password" placeholder="password" />

                <input type="submit" value="LOGIN">
            </form>
        </div>
        <div class="socialmedia">
            <ul>
                <li>
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="fa fa-facebook" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="fa fa-github" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="fa fa-lastfm" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="fa fa-slack" aria-hidden="true"></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span class="fa fa-wikipedia-w" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
        </div>
    </body>
</html>