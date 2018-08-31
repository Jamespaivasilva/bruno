<?php
	include "../model/conexao.php";
	include "../controlers/validaPost.php";
	
	$id = $_GET['cd'];
	$id_anuncio = $_GET['reserva'];
	$cod_empresa = $_GET['cod_empresa'];
	$nota = validaPost('nota');
	$comentario = validaPost('comentario');
	$data = date('Y-m-d');

	if($nota === "1" || $nota === "2" || $nota === "3"){
		$positivo = "0";
		$negativo = "1";
		$regular = "0";
	}elseif ($nota === "4" || $nota === "5" || $nota === "6") {
		$positivo = "0";
		$negativo = "0";
		$regular = "1";
	}else{
		$positivo = "1";
		$negativo = "0";
		$regular = "0";
	}

	$insert = "INSERT INTO avaliacoes (cod_empresa, cod_usuario, positiva, negativa, regular)
			   VALUES ('$cod_empresa', '$id', '$positivo', '$negativo', '$regular')";
    $query = mysqli_query($conexao, $insert) or die ("Erro ao conectar");

	$insert_comentario = "INSERT INTO comentario (cod_usuario, cod_empresa, dthr_entrada, comentario)
						   VALUES ('$id', '$cod_empresa', '$data', '$comentario' )";
	$query = mysqli_query($conexao, $insert_comentario) or die ("Erro ao conectar");		   

	header('Location: ../view/perfil-usuario-admin-avaliacao.php?cd='.$id. '&reserva='.$id_anuncio);				
?> 