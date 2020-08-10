<?php
	include("db.php");
	include("header.php");

	$matricula= filter_input(INPUT_GET, "matricula");

	$link= mysqli_connect("localhost", "root", "", "colegio");

	if ($link) {
		$query= mysqli_query($link, "DELETE FROM alunos WHERE matricula='$matricula'");
		if ($query) {
			header("Location: index.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
			die("Erro: ". mysqli_error($link));
		}
?>