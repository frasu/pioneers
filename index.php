<?php
    session_start();

    if (isset($_SESSION['users'])) {
        header("Location: game.php");
        exit();
    }

?>

<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Osadnicy - gra przeglądarkowa</title>
    </head>
    <body>
        Tylko tłuści ujrzeli koniec talerza - Spaślak z Chicago<br /><br />

        Nie masz konta? <a href="register.php">Zarejestruj się już teraz!</a><br /><br />

        <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'] . "<br /><br />";
                unset($_SESSION['error']);
            }
        ?>

        <form action="zaloguj.php" method="post">

            Login: <br />
            <input type="text" name="login" <?= isset($_SESSION['login']) ? 'value="' . $_SESSION['login'] . '"' : '' ?>/> <br />

            Hasło: <br />
            <input type="password" name="password" /> <br /><br />

            <input type="submit" value="Zaloguj się">

        </form>
    </body>
</html>