<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 07.01.19
 * Time: 08:02
 */
    session_start();
    if (!isset($_SESSION['registered'])) {
        header("Location: index.php");
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
        <p>Zarejestrowany!</p>

        <p><a href="index.php">Zaloguj się już teraz</a></p>
        </form>
    </body>
</html>