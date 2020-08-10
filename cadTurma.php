<?php
	$error= "";
	include("db.php");
	if (isset($_POST['registrar'])) {
		$desc= $_POST['desc'];
		$vagas= $_POST['vagas'];
		$prof= $_POST['prof'];
		

		if (strlen($desc) < 10) {
			$error= "<h2 style= 'color:red'>Descrição de turma muito curta</h2>";
		}else if (strlen($prof) < 3) {
			$error= "<h2 style= 'color:red'>Nome do professor muito curto</h2>";
		}else{
			$query = mysql_query("INSERT INTO turma(`descricao`, `vagas`, `professor`) VALUES('$desc','$vagas','$prof')");
			$error= "<h2 style= 'color:green'>Aluno(a) cadastrado com sucesso!</h2>";

			

		}
		}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro turma</title>
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
			<table width="17%">
				<tr>
					<td style="float: left;">Descrição:</td>
					<td><input type="text" name="desc" placeholder="Descrição" required></td>
				</tr>
				<tr>
					<td style="float: left;">Quantidade de vagas:</td>
					<td><input type="name" name="vagas" placeholder="Quantidade de vagas" required></td>
				</tr>

				<tr>
					<td style="float: left;">Nome do professor:</td>
					<td><input type="name" name="prof" placeholder="Nome do professor" required></td>
				</tr>

				
			</table>
			<tr>
					<input type="submit" name="registrar" value="Registrar" style="width: 17%">
				</tr>
		</form>
									

</body>
</html>