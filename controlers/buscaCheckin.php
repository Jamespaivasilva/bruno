<?php
		include '../model/conexao.php';
		include 'validaPost.php';
		include '../model/update.php';
		include '../model/conexao.php';
		include 'retiraCaracterEspecial.php';

		$tabela = validaPost('atributo');
		$texto = validaPost('texto');

		if(isset($_POST['busca'])){
			$select = "SELECT id_reserva, nome, dt_reserva, hr_reserva, nome_fantasia
					  FROM reserva
					  INNER JOIN pessoa_fisica ON reserva.cod_usuario = pessoa_fisica.cod_usuario
				      INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
				      WHERE $tabela LIKE '%$texto'";
			$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());
			$contador = $query->num_rows;			

			$tb_teste = mysqli_fetch_array($query);

	    	header('Location: ../view/perfil-admin-checkin.php?id=9&iduser='.$tb_teste[0] . '&contador='.$contador);
		}		                        
?> 		
