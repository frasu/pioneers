<?php
    session_start();

	if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true)) {
		header('Location: gra.php');
		exit();
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Sejf</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="menu">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="register.php">Registration</a></li>
			<li><a href="#">Our Team</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
    <div class="content">

        <form action="zaloguj.php" method="post">
            Login <br />
            <input type="text" name="login">

            <br /><br />

            Password <br />
            <input type="password" name="password">

            <br /><br>

            <input type="submit" name="" value="Log in">
        </form>
    </div>
<?php
	if(isset($_SESSION['blad']))
		echo "<p>".$_SESSION['blad']."</p>";
?>

</body>