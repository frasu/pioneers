<?php
	session_start();

	if(!isset($_SESSION['zalogowany'])) {
		header('Location: index.php');
		exit();
	}
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Osadnicy</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body>

<?php

	echo "<p>Witaj <b>".$_SESSION['user'].'</b>! [<a href="logout.php">Wyloguj się</a>]</p>';
	echo "<p>Drewno: <b>".$_SESSION['drewno']."</b> | ";
	echo "Zboże <b>".$_SESSION['zboze']."</b> | ";
	echo "Kamień <b>".$_SESSION['kamien']."</b></p>";

	echo "<p>Adres email: <b>".$_SESSION['email']."</b><br />";
	echo "Pozostało dni premium: ".$_SESSION['dnipremium'].", wykup kolejne dni już teraz!</p>";


?>

</body>
</html>