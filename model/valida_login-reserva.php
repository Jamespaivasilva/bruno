<?php
	include 'conexao.php';
	include '../controlers/validaPost.php';

	$id = $_GET['id'];

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

	if(isset($email) && strlen(isset($email)) > 0){

		if(!isset($_SESSION))
			session_start();

		$_SESSION['email'] = mysqli_real_escape_string($conexao,$email);	
		$_SESSION['senha'] = $senha;

		$sql_code = "SELECT senha, cod_usuario from pessoa_fisica where email = '$_SESSION[email]'";
		$sql_query = mysqli_query($conexao, $sql_code) or die ("Erro ao conectar");
		$dado = $sql_query->fetch_assoc();
		$total = $sql_query->num_rows;

		$erro=[];		
		if($total == 0) {
			$erro[]= "Usuário inválido";

		}else{
			if($dado['senha'] == $_SESSION['senha']){
				$_SESSION['usuario'] = $dado['cod_usuario'];
			}else{
				$erro[] = "Senha incorreta.";
			}
		}

		if(count($erro) == 0){		
			//Cadastrado com sucesso redireciona para a página de perfil do usuário
			mysqli_close($conexao);
			header('Location: ../view/perfil-estabelecimento.php?id=' .$id);
		}else{
			//Falha no cadastro, erro de login ou senha (Acesso negado)
			mysqli_close($conexao);
			header('Location: ../view/acesso-negado.php');
            
		}
	}
?>

