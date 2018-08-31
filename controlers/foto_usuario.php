<?php
	function fotoUsuario () {
		include "../model/conexao.php";
		if(!isset($_SESSION))
            session_start();
		
		$email = $_SESSION['email'];

		$imagem = "SELECT foto_perfil from pessoa_fisica where email = '$email'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar &raquo; " . mysql_error());

	    $imagem = [];
	    $i = 0;

	    while($tb_imagem = mysqli_fetch_array($sql_query)) {
	        $imagem[$i] = $tb_imagem['foto_perfil'];
	        $i++;
	    }
	    return $imagem[0];
	} 
?> 