<?php
		include '../model/conexao.php';
		include 'validaPost.php';
		include '../model/update.php';
		include '../model/conexao.php';
		include 'retiraCaracterEspecial.php';
		//include '../model/recupera-senha-pessoa-fisica.php';

		$senha = validaPost('senha');
		$nova_senha = validaPost('nova_senha');
		
		if(!isset($_SESSION))
			session_start(); 
		
		if($senha == $nova_senha){
			$q_email = mysqli_query($conexao, update("pessoa_fisica", "senha", $senha, $_SESSION['email'] ));
			header('Location: ../view/perfil-usuario.php');
			$_SESSION['mensagem'] = "Alterado com sucesso!";
			$_SESSION['email'] =  $_SESSION['email'];
			//echo "<script language=javascript>alert( 'Senha alterada com sucesso!' );</script>";			
		}else{
			$_SESSION['erro'] = "Senhas não correspondem";
			header('Location: ../view/redefinir-senha-pessoa-fisica.php');
		}

		mysqli_close($conexao);
?> 		
