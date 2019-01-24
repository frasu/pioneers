<?php
	session_start();

	if(isset($_POST['email'])) {
		//udana walidacja? tak
		$verified = true;

		$nick = $_POST['nick'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$pass1 = $_POST['pass1'];

		$start = '<div class="error">';
		$end = '</div>';
		//your site secret key
	    $secret = '6Lf7ToYUAAAAAFh0xfMSOF8YmgvNzZ20Oah8rUGC';
	    //get verify response data
	    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	    $responseData = json_decode($verifyResponse);

		if(!($responseData->success)) {
	    	$verified = false;
	    	$_SESSION['e_bot'] = 'Jesteś botem. Przestań nim być i wróć ponownie.';
	    }

		//sprawdzenie długości nicka
		if(strlen($nick) < 3 || (strlen($nick) > 20)) {
			$verified = false;
			$_SESSION['e_nick'] = 'Nick musi posiadać od 3 do 20 znaków';
		}

		if(!ctype_alnum($nick)) {
			$verified = false;
			$_SESSION['e_nick'] = 'Nick może składać się tylko ze znaków alfanumerycznych';
		}

		if(!strpos($email, '@')) {
			$verified = false;
			$_SESSION['e_email'] = 'Niepoprawny adres email';
		}

		if(strlen($pass) < 6) {
			$verified = false;
			$_SESSION['e_pass'] = 'Hasło musi składać się minimum z 6 znaków';
		}

		if($pass!=$pass1) {
			$verified = false;
			$_SESSION['e_pass1'] = 'Hasła nie są takie same';
		}

		if(!isset($_POST['tos'])) {
			$verified = false;
			$_SESSION['e_tos'] = 'Nie dokonałeś akceptacji regulaminu';
		}

		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);

		try {
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if($polaczenie->connect_errno!=0) {
				throw new Exception(mysqli_connect_errno());
			} else {
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");

				if (!$rezultat) throw new Exception($polaczenie->error);

				$ile_maili = $rezultat->num_rows;
				if($ile_maili>0) {
					$verified = false;
					$_SESSION['e_email'] = 'Istnieje już taki email w bazie';
				}

				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");

				if (!$rezultat) throw new Exception($polaczenie->error);

				$ile_nickow = $rezultat->num_rows;
				if($ile_nickow>0) {
					$verified = false;
					$_SESSION['e_nick'] = 'Ten nick jest już zajęty, spróbuj inny.';
				}
				
				if($verified) {
					$hashed = password_hash($pass1, PASSWORD_DEFAULT);

					if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$hashed', '$email', 100, 100, 100, 14)")) {
						$_SESSION['registered'] = true;
						header('Location: witamy.php');
					} else {
						throw new Exception($polaczenie->error);
					}
				}

				$polaczenie->close();
			}
		} catch(Exception $e) {
			echo $start.'Błąd serwera! Wróć ponownie później.'.$end;
			echo $start.$e.$end;
		}
	}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Osadnicy - załóż darmowe konto!</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<script src='https://www.google.com/recaptcha/api.js?render=6Lf7ToYUAAAAALUtqMmQMBNz4CgebGZDBBuiNDwp'></script>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<style>
		.error {
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		.success {
			color:green;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<script>
	grecaptcha.ready(function() {
		grecaptcha.execute('6Lf7ToYUAAAAALUtqMmQMBNz4CgebGZDBBuiNDwp', {action: 'register_user'})
	.then(function(token) {
		console.log(token)
		document.getElementById('g-recaptcha-response').value = token;
	});
	});
	</script>

	<?php
		if(isset($_SESSION['e_bot'])) {
			echo $start.$_SESSION['e_bot'].$end;
			unset($_SESSION['e_bot']);
		}
	?>

	<div class="form">
		<form method="post">
			<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">

			Nickname: <br />
			<input type="text" name="nick"><br />

			<?php
				if(isset($_SESSION['e_nick'])) {
					echo $start.$_SESSION['e_nick'].$end;
					unset($_SESSION['e_nick']);
				}
			?>

			Email: <br />
			<input type="text" name="email"><br />

			<?php
				if(isset($_SESSION['e_email'])) {
					echo $start.$_SESSION['e_email'].$end;
					unset($_SESSION['e_email']);
				}
			?>

			Hasło: <br />
			<input type="password" name="pass"><br />

			<?php
				if(isset($_SESSION['e_pass'])) {
					echo $start.$_SESSION['e_pass'].$end;
					unset($_SESSION['e_pass']);
				}
			?>

			Powtórz hasło: <br />
			<input type="password" name="pass1"><br />

			<?php
				if(isset($_SESSION['e_pass1'])) {
					echo $start.$_SESSION['e_pass1'].$end;
					unset($_SESSION['e_pass1']);
				}
			?>

			<label><input type="checkbox" name="tos" />Akceptuję regulamin</label><br />

			<?php
				if(isset($_SESSION['e_tos'])) {
					echo $start.$_SESSION['e_tos'].$end;
					unset($_SESSION['e_tos']);
				}
			?>
			<br />
			<input type="submit" name="" value="Rejestruj" />


		</form>
	</div>

<?php
	if(isset($_SESSION['blad']))
		echo "<p>".$_SESSION['blad']."</p>";
?>

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