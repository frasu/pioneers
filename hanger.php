<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Pioneers</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="hanger.css">
        <link href="https://fonts.googleapis.com/css?family=Major+Mono+Display" rel="stylesheet">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="timer.js"></script>
        <script src="niemy.js"></script>
    </head>
    <body onload="start();">
        <div class="menu">
            <ul id="menu-ul">
                <li><a href="./">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Hanged Man</a></li>
                <li><a href="signup">Sign up</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="container">
            <div id="clue"></div>
            <div class="flex">
                <div id="hanger">
                        <img class="center" alt="hanger" src="img/h0.png">
                </div>
                <div id="alphabet">
                    <div id="letters">
                    </div>
                </div>
            </div>
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