<?php

		function retornaDadosAnuncio($posicao){
			include '../model/conexao.php';
			$id_anuncio = $_GET['idempresa'];

			$select = "SELECT valor, id_especialidade, descricao FROM anuncio WHERE id_anuncio = '$id_anuncio'";
			$query = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");

			$tb_anuncio = mysqli_fetch_array($query);

			if($posicao === 0){
				$tb_anuncio[0] = 'R$ ' . number_format($tb_anuncio[0], 2);
			}

			return $tb_anuncio[$posicao];
		}
		                        
?> 		
