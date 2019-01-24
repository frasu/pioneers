<?php
	session_start();

	if(!isset($_SESSION['registered'])) {
		header('Location: index.php');
		exit();
	} else {
		unset($_SESSION['registered']);
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Sejf</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body>
	<p>Dziękujemy za rejestrację w serwisie! Możesz już zalogować się na swoje konto.</p>

	<a href="index.php">Zaloguj się</a>

</body>