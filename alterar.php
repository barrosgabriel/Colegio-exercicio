<?php
include("db.php");
include("header.php");

	$matricula= filter_input(INPUT_GET,"matricula"); 
	$nome= filter_input(INPUT_GET,"nome"); 
	$sexo= filter_input(INPUT_GET,"sexo");
	$data= filter_input(INPUT_GET,"data"); 
	$cidade= filter_input(INPUT_GET,"cidade"); 
	$bairro= filter_input(INPUT_GET,"bairro"); 
	$rua= filter_input(INPUT_GET,"rua"); 
	$numero= filter_input(INPUT_GET,"numero"); 
	$complemento= filter_input(INPUT_GET,"complemento"); 

	$link= mysqli_connect("localhost","root","","colegio");

	if ($link) {
		$query= mysqli_query($link, "UPDATE alunos SET nome='$nome', sexo='$sexo', cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', complemento='$complemento' WHERE matricula='$matricula';");
		if ($query)  {
			header("Location: index.php");
		}else{
			die("Erro: " . mysqli_error($link));
		}
	}else{
			die("Erro: " . mysqli_error($link));
		}


?>