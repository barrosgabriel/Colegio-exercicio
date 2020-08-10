<?php
$id= $_GET['id'] OR DIE("ID INVALIDO!");
include("db.php");
$verify= mysql_query("SELECT * FROM users WHERE id = '$id'");
$verif= mysql_query("SELECT * FROM users WHERE id = '$id' AND active= '1'");
if (mysql_num_rows($verify) < 0) {
	die("ID INVALIDO!");
}else if (mysql_num_rows($verif) > 0) {
	die("ID já confirmado!");
}
echo "<h1>Conta confirmada!</h1>";
mysql_query("UPDATE users SET active='1' WHERE id = '$id' ");
?>