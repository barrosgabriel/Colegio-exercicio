<?php
	include("db.php");
	include("header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alteração da Turma</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php
		$ID= filter_input(INPUT_GET,"ID"); 
		$descricao= filter_input(INPUT_GET,"descricao"); 
		$vagas= filter_input(INPUT_GET,"vagas"); 
		$professor= filter_input(INPUT_GET,"professor"); 
		
		
	?>
</head>
<body>
	<div id="conteudo">
		<h1>Alteração de Turma</h1>
		<p>
			<form action="alterarTurma.php">
				<input type="hidden" name="ID" value="<?php echo $ID ?>" />
				Descrição: <input type="text" name="descricao" value="<?php echo $descricao ?>"/> <br/>
				Vagas: <input type="text" name="vagas" value="<?php echo $vagas ?>"/> <br/>
				Professor: <input type="text" name="professor" value="<?php echo $professor ?>"/> <br/>
				<br/>
				<input type="submit" value="Alterar"/>
			</form>
		</p>
	</div>

</body>
</html>