<?php

	function endereco_empresa($id){
		include "../model/conexao.php";

		$email = "SELECT endereco, numero, bairro, estado from pessoa_juridica where cod_empresa='$id'";
		$email = mysqli_query($conexao, $email) or die ("Erro ao conectar &raquo; " . mysql_error());

		$endereco = [];
		$i = 0;
		while($tb_nomeFantasia = mysqli_fetch_array($email)) {
		    $endereco[$i] = $tb_nomeFantasia['endereco'];
		    $numero[$i] = $tb_nomeFantasia['numero'];
		    $bairro[$i] = $tb_nomeFantasia['bairro'];
		    $estado[$i] = $tb_nomeFantasia['estado'];
		    $i++;
    	}
    	$i = 0;
    	$endereco_completo = $endereco[0] . ", " . $numero[0];

    	mysqli_close($conexao);

		return $endereco_completo;	
	}
?> 