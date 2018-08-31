<?php

	function nome_empresa ($id) {
		include "../model/conexao.php";

		$email = "SELECT nome_fantasia from pessoa_juridica where cod_empresa='$id'";
		$email = mysqli_query($conexao, $email) or die ("Erro ao conectar &raquo; " . mysql_error());

		$nome_fantasia = [];	
		$i = 0;
		while($tb_nomeFantasia = mysqli_fetch_array($email)) {
		    $nome_fantasia[$i] = $tb_nomeFantasia['nome_fantasia'];
		    $i++;
    	}
		return $nome_fantasia[0];
	} 
?> 