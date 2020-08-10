<?php
	if (isset($_COOKIE['login'])) {
		header("Location: ./");
	}

	include("db.php");
	$error ="";

	if (isset($_POST['login'])) {
		$email= $_POST['email'];
		$pass= $_POST['pass'];

		$verifEmail= mysql_query("SELECT email FROM users WHERE email= '$email' AND senha= '$pass'");

		if (mysql_num_rows($verifEmail) > 0) {
			$active= mysql_result(mysql_query("SELECT active FROM users WHERE email= '$email'"), 0);
			if ($active == true ) {
				setcookie("login", $hash);
				header("Location: ./");
				$hash= mysql_result(mysql_query("SELECT hash FROM users WHERE email = '$email'"), 0);
				setcookie("login",$hash);
				
			}else {
			$error= "<h2 style='color:red'>Você precisa confirmar o seu email!</h2>";
			}
		}else {
			$error= "<h2 style='color:red'>Senha ou email errados!</h2>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("header.php");?>
	<center>
		<h1 style="color: white">Login</h1>
		<div class="panel">
			<?php echo $error; ?>
			<form method="POST">
			<table width="15%">
				<tr>
					<td style="float: right;">Email: </td>
					<td><input type="email" name="email"><br/></td>
				</tr>
				<tr>
					<td style="float: right;">Senha: </td>
					<td><input type="password" name="pass"><br/></td>
				</tr>
			</table>
			<tr><input type="submit" name="login" value="Logar" style="width: 15%"></tr>

			</form>
				<h3>Você não possui conta? <a href="register.php">Clique aqui</a></h3>
		</div>
	</center>

</body>
</html>