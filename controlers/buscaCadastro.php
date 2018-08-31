<?php
		include '../model/conexao.php';
		include 'validaPost.php';
		include '../model/update.php';
		include '../model/conexao.php';
		include 'retiraCaracterEspecial.php';

		$tabela = validaPost('atributo');
		$texto = validaPost('texto');

		if(isset($_POST['busca'])){
			$select = "SELECT cod_empresa, razao_social, nome_fantasia, cnpj, cep, endereco, telefone FROM pessoa_juridica WHERE $tabela LIKE '%$texto' limit 1";
			$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());

			$tb_teste = mysqli_fetch_array($query);

	    	header('Location: ../view/perfil-admin-cadastros.php?id=9&idempresa='.$tb_teste[0].'&query=' .$select);
		}	
		                        
?> 		
