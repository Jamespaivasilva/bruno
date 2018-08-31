<?php
		include '../model/conexao.php';
		include 'validaPost.php';
		include '../model/update.php';
		include '../model/conexao.php';
		include 'retiraCaracterEspecial.php';

		$tabela = validaPost('atributo');
		$texto = validaPost('texto');

		if(isset($_POST['busca'])){

			if($tabela === "1"){
				$nome_empresa = "SELECT cod_empresa FROM pessoa_juridica WHERE nome_fantasia LIKE '%$texto'";
				$query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar &raquo; " . mysql_error());
				$id_empresa = mysqli_fetch_array($query);

				$select = "SELECT id_anuncio, cod_empresa, created_at FROM anuncio WHERE cod_empresa='$id_empresa[0]' LIMIT 1";
				$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());
				$tb_teste = mysqli_fetch_array($query);

				echo "SIM";
			}else{
				$select = "SELECT id_anuncio, cod_empresa, created_at FROM anuncio WHERE $tabela LIKE '%$texto' LIMIT 1";
				$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());
				$tb_teste = mysqli_fetch_array($query);
			}

	    	header('Location: ../view/perfil-admin-cadastros-anunciantes.php?id=9&idempresa='.$tb_teste[0]);
		}	
		                        
?> 		
