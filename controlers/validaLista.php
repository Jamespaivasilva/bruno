<?php
		include "../model/conexao.php";
		include '../controlers/validaPost.php';

		$id = $_GET['id'];
		$id_reserva = validaPost('cliente');

		$reserva = "SELECT nome, cpf, reserva.id_reserva, dt_reserva, qtd_pessoa FROM pessoa_fisica 
						INNER JOIN reserva ON reserva.cod_usuario = pessoa_fisica.cod_usuario
						INNER JOIN pessoa_juridica ON pessoa_juridica.cod_empresa = reserva.cod_empresa
						WHERE reserva.id_reserva = '$id_reserva' AND pessoa_juridica.cod_empresa = '$id' ORDER BY id_reserva";

		$reserva = mysqli_query($conexao, $reserva) or die ("Erro ao conectar &raquo; " . mysql_error());

		$a_nome = [];
		$a_cpf = [];
		$a_reserva = [];
		$a_dtreserva = [];
		$a_qtdpessoa = [];	
		$i = 0;

		while($tb_cpf = mysqli_fetch_array($result_cpf)) {
			$a_nome[$i] = $tb_cpf['nome'];
			$a_cpf[$i] = $tb_cpf['cpf'];
			$a_reserva[$i] = $tb_cpf['id_reserva'];
			$a_dtreserva[$i] = $tb_cpf['dt_reserva'];
			$a_qtdpessoa[$i] = $tb_cpf['qtd_pessoa'];
			$i++;
     	}

  		mysqli_close($conexao);
     		header('Location: ../view/reserva-visao-estabelecimento.php?id='. $id. '&reserva=true&res='. $id_reserva);
?> 