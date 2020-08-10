<?php
include("db.php");
$error= "";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Listar Turma</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php 
		$parametro= filter_input(INPUT_GET, "parametro");
		$mysqllink= mysql_connect("localhost","root","");
		mysql_select_db("colegio");

		if($parametro){
			$dados= mysql_query("SELECT * FROM turma WHERE LIKE ID '$parametro%' ORDER BY ID");
		}else {
			$dados= mysql_query("SELECT * FROM turma ORDER BY ID");
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
					<td>ID:</td>
					<td>Descrição:</td>
					<td>Vagas:</td>
					<td>Professor:</td>
				</tr>

				<?php 
					if($total){ do {
				?>

				<tr>
					<td><?php echo $linha['ID'] ?></td>
					<td><?php echo $linha['descricao'] ?></td>
					<td><?php echo $linha['vagas'] ?></td>
					<td><?php echo $linha['professor'] ?></td>
					<td><a href="<?php echo "alteracaoTurma.php?ID=" . $linha['ID'] . "&descricao=" . $linha['descricao'] . "&vagas=" . $linha['vagas'] . "&professor=" . $linha['professor']?>">Alterar</a></td>
					<td><a href="<?php echo "excluirTurma.php?ID=" . $linha['ID']?>">Excluir</a></td>
					
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