<?php
	function fotoEmpresa ($id) {
		include "../model/conexao.php";

		$imagem = "SELECT foto_empresa from pessoa_juridica where cod_empresa = '$id'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar &raquo; " . mysql_error());

	    $imagem = [];
	    $i = 0;

	    while($tb_imagem = mysqli_fetch_array($sql_query)) {
	        $imagem[$i] = $tb_imagem['foto_empresa'];
	        $i++;
	    }

	    mysqli_close($conexao);
	    return $imagem[0];
	} 
?> 