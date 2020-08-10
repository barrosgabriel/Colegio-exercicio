<?php
	$hash= $_COOKIE['login'];
	$login= mysql_query("SELECT * FROM users WHERE hash = '$hash'");
	$row = mysql_fetch_object($login);
?>

<div class="navbar">
	<a href="index.php">Inicio</a>
	
	
	<?php
		if (isset($_COOKIE['login'])){
			echo '<a href="logout.php" class="right">Sair</a>';
			
			echo '<a href="listarTurma.php" class="right">Listar Turma</a>';
			echo '<a href="cadTurma.php" class="right">Cadastrar Turma</a>';
			
			echo '<a href="listar.php" class="right">Listar Aluno</a>';
			echo '<a href="cadAluno.php" class="right">Cadastrar Aluno</a>';


		}else{
			echo '<a href="login.php" class="right">Login</a>';
		}
	
	?>
</div>