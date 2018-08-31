<?php
	include 'conexao.php';
	include '../controlers/validaPost.php';
	include '../controlers/retiraCaracterEspecial.php';
	include '../controlers/select.php';

	$email = validaPost('email');
	$dtNascimento = validaPost('dtNascimento');
	$pergunta = validaPost('pergunta');
	$resposta = validaPost('resposta');

	if(!isset($_SESSION))
		session_start();

	$_SESSION['email'] = "";
	$_SESSION['dtNascimento'] = "";
	$_SESSION['pergunta'] = "";
	$_SESSION['respota'] = "";

	$_SESSION['email'] = retiraCaracterEspecial($email);
	$_SESSION['dtNascimento'] = retiraCaracterEspecial($dtNascimento);	
	$_SESSION['pergunta'] = retiraCaracterEspecial($pergunta);
	$_SESSION['resposta'] = retiraCaracterEspecial($resposta);
	
	// Fazendo o select no banco passando 4 parametros
	// campo, tabela, campo e condição. 
	$q_email = mysqli_query($conexao, select("email", "pessoa_fisica", "email", $_SESSION['email'], ""));
	$total_email = $q_email->num_rows;
	$q_dtNascimento = mysqli_query($conexao, select("dtNascimento", "pessoa_fisica", "dtNascimento",$_SESSION['dtNascimento'], " and email = '" . $_SESSION['email']."'"));	
	$total_nascimento = $q_dtNascimento->num_rows;
	$q_pergunta = mysqli_query($conexao, select("pergunta", "pessoa_fisica", "pergunta", $_SESSION['pergunta'], " and email = '" . $_SESSION['email']."'" ));
	$total_pergunta = $q_pergunta->num_rows;
	$q_resposta = mysqli_query($conexao, select("resposta", "pessoa_fisica", "resposta", $_SESSION['resposta'], " and email = '" . $_SESSION['email']."'"));
	$total_resposta = $q_resposta->num_rows;

	if($total_email == 0){
		$_SESSION['mensagem_erro'] = "E-mail inválido";
		header('Location: ../view/recupera-senha-pessoa-fisica.php');
	}elseif($total_nascimento == 0){
		$_SESSION['mensagem_erro'] = "Data de nascimento inválida";
		header('Location: ../view/recupera-senha-pessoa-fisica.php');
	}elseif ($total_pergunta == 0) {
		$_SESSION['mensagem_erro'] = "Pergunta secreta inválida";
		header('Location: ../view/recupera-senha-pessoa-fisica.php');
	}elseif($total_resposta == 0){
		$_SESSION['mensagem_erro'] = "Resposta secreta inválida";
		header('Location: ../view/recupera-senha-pessoa-fisica.php');
	}else{
		// redireciona para a tela de nova senha
		//header('Location: ');
	}	 
?>