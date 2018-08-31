<?php
		include '../model/conexao.php';
		include 'validaPost.php';
		include '../model/update.php';
		include '../model/conexao.php';
		include 'retiraCaracterEspecial.php';

		$tabela = validaPost('atributo');
		$texto = validaPost('texto');

		if(isset($_POST['busca'])){
			$select = "SELECT id, nome, email, motivo, assunto FROM contatos WHERE $tabela LIKE '%$texto%' LIMIT 1;";
			$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());

			$tb_teste = mysqli_fetch_array($query);

	    	header('Location: ../view/perfil-admin-canal-de-ajuda.php?id=9&iduser='.$tb_teste[0].'&query=' .$select);
		}	
		                        
?> 		
