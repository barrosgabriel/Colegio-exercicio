<?php
	$error= "";
	include("db.php");
	if (isset($_POST['registrar'])) {
		$nome= $_POST['nome'];
		$sexo= $_POST['sexo'];
		$data= $_POST['data'];
		$cidade= $_POST['cidade'];
		$bairro= $_POST['bairro'];
		$rua= $_POST['rua'];
		$numero= $_POST['numero'];
		$complemento= $_POST['complemento'];

		if (strlen($nome) < 3) {
			$error= "<h2 style= 'color:red'>Nome muito pequeno</h2>";
		}else if (strlen($cidade) < 3) {
			$error= "<h2 style= 'color:red'>Nome de cidade muito pequeno</h2>";
		}else{
			$query = mysql_query("INSERT INTO alunos(`nome`, `sexo`, `data`, `cidade`, `bairro`, `rua`, `numero`, `complemento`) VALUES('$nome','$sexo','$data','$cidade','$bairro','$rua','$numero','$complemento')");
			$error= "<h2 style= 'color:green'>Aluno(a) cadastrado com sucesso!</h2>";

			

		}
		}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro aluno</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include("header.php");
	?>
	<center>
	<h1>Registre-se</h1>
	<div class="panel">
		<?php echo "$error"; ?>
		<form method="POST">
			<table width="15%">
				<tr>
					<td style="float: left;">Nome:</td>
					<td><input type="name" name="nome" placeholder="Usuário" required></td>
				</tr>
				<tr>
					<td style="float: left;">Sexo:</td>
					<td><select name="sexo" required>
					<option value=""selected></option> 
  					<option value="masculino">Masculino</option> 
  					<option value="feminino" >Feminino</option>
					</select>
				</tr>
				<tr>
					<td style="float: left;">Data de nascimento:</td>
					<td><input type="date" name="data" required></td>
				</tr>
				<tr>
					<td style="float: left;">Cidade:</td>
					<td><input type="name" name="cidade" placeholder="Cidade"></td>
				</tr>
				<tr>
					<td style="float: left;">Bairro:</td>
					<td><input type="name" name="bairro" placeholder="Bairro"></td>
				</tr>
				<tr>
					<td style="float: left;">Rua:</td>
					<td><input type="name" name="rua" placeholder="Rua"></td>
				</tr>
				<tr>
					<td style="float: left;">Numero:</td>
					<td><input type="name" name="numero" placeholder="Numero"></td>
				</tr>
				<tr>
					<td style="float: left;">Complemento:</td>
					<td><input type="name" name="complemento" placeholder="Complemento" ></td>
				</tr>
			</table>
			<tr>
					<input type="submit" name="registrar" value="Registrar" style="width: 15%">
				</tr>
		</form>
									

</body>
</html>