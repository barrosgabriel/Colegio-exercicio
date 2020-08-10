<?php
	include("db.php");
	include("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alteração de Alunos</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		$matricula= filter_input(INPUT_GET,"matricula"); 
		$nome= filter_input(INPUT_GET,"nome"); 
		$sexo= filter_input(INPUT_GET,"sexo"); 
		$cidade= filter_input(INPUT_GET,"cidade"); 
		$bairro= filter_input(INPUT_GET,"bairro"); 
		$rua= filter_input(INPUT_GET,"rua"); 
		$numero= filter_input(INPUT_GET,"numero"); 
		$complemento= filter_input(INPUT_GET,"complemento"); 
		
	?>
</head>
<body>
	<div id="conteudo">
		<h1>Alteração de Aluno</h1>
		<p>
			<form action="alterar.php">
				<input type="hidden" name="matricula" value="<?php echo $matricula ?>" />
				Nome: <input type="text" name="nome" value="<?php echo $nome ?>"/> <br/>
				sexo: <input type="text" name="sexo" value="<?php echo $sexo ?>"/> <br/>
				Cidade: <input type="text" name="cidade" value="<?php echo $cidade ?>"/> <br/>
				Bairro: <input type="text" name="bairro" value="<?php echo $bairro ?>"/> <br/>
				Rua: <input type="text" name="rua" value="<?php echo $rua ?>"/> <br/>
				Número: <input type="text" name="numero" value="<?php echo $numero ?>"/> <br/>
				Complemento: <input type="text" name="complemento" value="<?php echo $complemento ?>"/> <br/>
				<input type="submit" value="Alterar"/>
			</form>
		</p>
	</div>

</body>
</html>