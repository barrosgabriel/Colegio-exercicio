<?php
include("db.php");
$error= "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listar Aluno</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php 
		$parametro= filter_input(INPUT_GET, "parametro");
		$mysqllink= mysql_connect("localhost","root","");
		mysql_select_db("colegio");

		if($parametro){
			$dados= mysql_query("SELECT * FROM alunos WHERE LIKE nome '$parametro%' ORDER BY nome");
		}else {
			$dados= mysql_query("SELECT * FROM alunos ORDER BY nome");
		}

		$linha= mysql_fetch_assoc($dados);
		$total= mysql_num_rows($dados);
	?>
</head>
<body>
	<?php include("header.php"); ?>
	<center>
	<h1>Registre-se</h1>
	<div class="panel">
		<?php echo "$error"; ?>
		<form method="POST">
			<table border="1">
				<tr>
					<td>Matricula:</td>
					<td>Nome:</td>
					<td>Sexo:</td>
					<td>Data:</td>
					<td>Cidade:</td>
					<td>Bairro:</td>
					<td>Rua:</td>
					<td>Número:</td>
					<td>Complemento:</td>

				</tr>

				<?php 
					if($total){ do {
				?>

				<tr>
					<td><?php echo $linha['matricula'] ?></td>
					<td><?php echo $linha['nome'] ?></td>
					<td><?php echo $linha['sexo'] ?></td>
					<td><?php echo $linha['data'] ?></td>
					<td><?php echo $linha['cidade'] ?></td>
					<td><?php echo $linha['bairro'] ?></td>
					<td><?php echo $linha['rua'] ?></td>
					<td><?php echo $linha['numero'] ?></td>
					<td><?php echo $linha['complemento'] ?></td>
					<td><a href="<?php echo "alteracao.php?matricula=" . $linha['matricula'] . "&nome=" . $linha['nome'] . "&sexo=" . $linha['sexo'] . "&cidade=" . $linha['cidade'] . "&bairro=" . $linha['bairro'] . "&rua=" . $linha['rua'] . "&numero=" . $linha['numero'] . "&complemento=" . $linha['complemento']?>">Alterar</a></td>
					<td><a href="<?php echo "excluirAluno.php?matricula=" . $linha['matricula']?>">Excluir</a></td>
				</tr>

				<?php 
					}while ($linha= mysql_fetch_assoc($dados));

					mysql_free_result($dados);}
				
				mysql_close($mysqllink);
				?>
				
			</table>
			
		</form>
		

	</div>
	</center>
</body>
</html>