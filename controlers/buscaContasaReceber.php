<?php
		include '../model/conexao.php';
		include 'validaPost.php';
		include '../model/update.php';
		include '../model/conexao.php';
		include 'retiraCaracterEspecial.php';

		$tabela = validaPost('atributo');
		$texto = validaPost('texto');

		if(isset($_POST['busca'])){
			$select = "SELECT  created_at, num_transacao, valor, plano,  bandeira, cod_autorizacao, validade_plano, cod_empresa 
					   FROM transacoes
				       WHERE num_transacao = '$texto'";
			$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());
			$contador = $query->num_rows;

			$tb_teste = mysqli_fetch_array($query);		

	    	header('Location: ../view/perfil-admin-contas-a-receber.php?id=9&contador='.$contador. '&tran='. $tb_teste[1]);
		}		                        
?> 		
