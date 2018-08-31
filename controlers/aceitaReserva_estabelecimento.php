<?php
	include "../model/conexao.php";
	include "../controlers/validaPost.php";

	$id = $_GET['id'];
	$id_reserva = validaPost('confirmar');

	$update = "UPDATE reserva
				SET STATUS='1'
				WHERE cod_empresa = '$id' AND id_reserva = '$id_reserva'";

	$update = mysqli_query($conexao, $update) or die ("Erro ao conecta &raquo; " . mysql_error());
	mysqli_close($conexao);

	header('Location: ../view/reserva-visao-estabelecimento.php?id='.$id);

?> 		
