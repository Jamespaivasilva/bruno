<?php
	include "../model/conexao.php";
	include "../controlers/validaPost.php";
	$id = $_GET['id'];

	$nome = validaPost('nome');
	$email = validaPost('email');
	$motivo_contato = validaPost('motivoContato');
	$descricao = validaPost('descricaoAssunto');
	$dt_hora = date("y-m-d H:i:s");

	$insert = "INSERT into contatos (nome,email,motivo,assunto, created_at, resposta) values ('$nome', '$email', '$motivo_contato', '$descricao', '$dt_hora', '0')";
	mysqli_query($conexao, $insert) or die ("Erro ao conectar &raquo; " . mysql_error());
	mysqli_close($conexao);

	header('Location: ../view/pessoa-jurica-admin.php?id='. $id);
?> 		
