<?php

	function dadosReserva($posicao){
		include '../model/conexao.php';
		$id_user = $_GET['iduser'];

		$query = "SELECT nome, dt_reserva, hr_reserva, nome_fantasia, qtd_pessoa
				  FROM reserva
				  INNER JOIN pessoa_fisica ON reserva.cod_usuario = pessoa_fisica.cod_usuario
			      INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
			      WHERE id_reserva =  '$id_user'";

		$r_query = mysqli_query($conexao, $query) or die ("Erro ao conectar &raquo; " . mysql_error());

		$tb_cliente = [];
	    $tb_cliente = mysqli_fetch_array($r_query);

	    return $tb_cliente[$posicao];   
	}
	
		                        
?> 		
