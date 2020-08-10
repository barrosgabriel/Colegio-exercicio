<?php
	include("db.php");
	include("header.php");

	$ID= filter_input(INPUT_GET, "ID");

	$link= mysqli_connect("localhost", "root", "", "colegio");

	if ($link) {
		$query= mysqli_query($link, "DELETE FROM turma WHERE ID='$ID'");
		if ($query) {
			header("Location: index.php");
		}else{
			die("Erro: ". mysqli_error($link));
		}
	}else{
			die("Erro: ". mysqli_error($link));
		}
?>