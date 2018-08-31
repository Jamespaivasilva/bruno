<?php	
	$conexao = mysqli_connect('localhost', 'root', '', 'db_searchnow') or die("Erro ao conectar ao servidor &raquo; " . mysql_error());
	$conexao->set_charset('utf8');
?>