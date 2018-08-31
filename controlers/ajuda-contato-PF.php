<?php
	include "../model/conexao.php";
	include "../controlers/validaPost.php";
	$cd = isset($_GET['cd']) ? $_GET['cd'] :'';

	$nome = validaPost('nome');
	$email = validaPost('email');
	$motivo_contato = validaPost('motivoContato');
	$descricao = validaPost('descricaoAssunto');
	$dt_hora = date("y-m-d H:i:s");
	
	if($nome <> ""){
		$insert = "INSERT into contatos (nome,email,motivo,assunto, created_at, resposta) values ('$nome', '$email', '$motivo_contato', '$descricao', '$dt_hora', '0')";
		$query =  mysqli_query($conexao, $insert) or die ("Erro ao conectar &raquo; " . mysql_error());
		$texto = div($query);
		mysqli_close($conexao);		

		header('Location: ../view/perfil-usuario-admin-ajuda.php?cd='.$cd);
	}

	function div($query){
		 if($query){
		 	$texto = "1";
		 }else{
		 	$texto = "0";
		 }
		return $texto;
	}	
?> 		
