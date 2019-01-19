<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 06.01.19
 * Time: 13:51
 */
    session_start();
    if (!isset($_SESSION['logged'])) {
        header("Location: index.php");
        exit();
    }

    function br() {
        echo "<br /><br />";
    }
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Osadnicy - gra przeglądarkowa</title>
    <script type="text/javascript" src="timer.js"></script>
</head>
<body onload="odliczanie();">

    <?php
    echo "Witaj " . $_SESSION['users'] . '! [ <a href="logout.php">Wyloguj się</a> ]';

    br();

    $dateAndTime = new DateTime();

    $end = DateTime::createFromFormat('Y-m-d H:i:s.u', $_SESSION['premium']);

    //var_dump(DateTime::getLastErrors());

    $different = $dateAndTime->diff($end);

    echo "Obecny czas: " . $dateAndTime->format('Y-m-d H:i:s');

    br();

    if ($end<$dateAndTime) {
        echo "Twoje premium minęło, wykup nowe już teraz!";
    } else {
        echo $different->format("Do końca Twojego premium zostało %d dni, %h godzin, %i minut oraz %s sekund.");
    }

    br();

    echo "Czas wygaśnięcia premium: " . date("Y-m-d H:i:s", strtotime($_SESSION['premium']));

    br();
    ?>

    <div id="zegar"></div>

</body>
</html>