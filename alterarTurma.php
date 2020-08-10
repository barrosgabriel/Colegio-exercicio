<?php
include("db.php");
include("header.php");

	$ID= filter_input(INPUT_GET,"ID"); 
	$descricao= filter_input(INPUT_GET,"descricao"); 
	$vagas= filter_input(INPUT_GET,"vagas");
	$professor= filter_input(INPUT_GET,"professor"); 
	
	$link= mysqli_connect("localhost","root","","colegio");

	if ($link) {
		$query= mysqli_query($link, "UPDATE turma SET descricao='$descricao', vagas='$vagas', professor='$professor' WHERE ID='$ID';");
		if ($query)  {
			header("Location: index.php");
		}else{
			die("Erro: " . mysqli_error($link));
		}
	}else{
			die("Erro: " . mysqli_error($link));
		}


?>