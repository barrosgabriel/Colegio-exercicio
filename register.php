<?php
	if (isset($_COOKIE['login'])) {
		header("Location: ./");
	}

	include("db.php");
	$error= "";
	if (isset($_POST['registrar'])) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$epass = $_POST['epass'];
		$notify = $_POST['notify'];
		
		

		$verify= mysql_query("SELECT * FROM users WHERE email= '$email'");


		if(strlen($nome) < 3){
			$error= "<h2 style= 'color:red'>Nome muito pequeno</h2>";
		}else if (strlen($email) < 8){
			$error= "<h2 style= 'color:red'>Email muito pequeno</h2>";
		}else if (strlen($pass) < 8) {
			$error= "<h2 style= 'color:red'>Senha deve ter no minímo 8 caracteres!</h2>";
		}else if ($pass != $epass) {
			$error= "<h2 style= 'color:red'>Senhas não condizem!</h2>";
		}else if (mysql_num_rows($verify) > 0) {
			$error= "<h2 style= 'color:red'>Email já registrado!</h2>";
		}else{
			$hash= bin2hex(mcrypt_create_iv(12, MCRYPT_DEV_URANDOM));
			$query- mysql_query("SELECT hash FROM users WHERE hash= '$hash'");

			if (mysql_num_rows($query) < 1) {
				$query = mysql_query ("INSERT INTO users(`nome`, `email`, `senha`, `notify`, `active`,`hash`) VALUES ('$nome','$email','$pass','$notify','false','$hash')");
				$error= "<h2 style= 'color:green'>Registrado com sucesso, entre em seu email para verifica-lo!</h2>";
			}else{
				return $hash;
			}
			

			


		}

		}
		
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("header.php"); ?>
	<center>
	<h1>Registre-se</h1>
	<div class="panel">
		<?php echo "$error"; ?>
		<form method="POST">
			<table width="50%">
				<tr>
					<td style="float: right;">Nome:</td>
					<td><input type="name" name="nome" placeholder="Usuário"></td>
				</tr>
				<tr>
					<td style="float: right;">Email:</td>
					<td><input type="Email" name="email" placeholder="Email"></td>
				</tr>
				<tr>
					<td style="float: right;">Senha:</td>
					<td><input type="password" name="pass" placeholder="Senha"></td>
				</tr>
				<tr>
					<td style="float: right;">Confirme a senha:</td>
					<td><input type="password" name="epass" placeholder="Confirme a senha"></td>
				</tr>
				<tr>
					<td style="float: right;">Deseja reeceber novidades por email?:</td>
					<td><input type="checkbox" name="notify"></td>
				</tr>
				
			</table>
			<tr>
					<input type="submit" name="registrar" value="Registrar" style="width: 50%">
				</tr>
		</form>
		<h3>Você já possui conta? <a href="login.php">Clique aqui</a></h3>

	</div>
	</center>
</body>
</html>