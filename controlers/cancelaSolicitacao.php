<?php
	include "../controlers/validaPost.php";
	include "../model/conexao.php";

	$email = validaPost('cancelamento');
	$cd = $_GET['cd'];

	$status = "SELECT id_reserva, pessoa_fisica.cod_usuario FROM pessoa_juridica 
					INNER JOIN reserva ON reserva.cod_empresa = pessoa_juridica.cod_empresa
					INNER JOIN pessoa_fisica ON pessoa_fisica.cod_usuario = reserva.cod_usuario
					WHERE pessoa_fisica.email = '$email' AND reserva.cancelamento = '0' ORDER BY reserva.dt_reserva DESC limit 1";

	$status = mysqli_query($conexao, $status) or die ("Erro ao conectar &raquo; " . mysql_error());

	$id_reserva = [];
	$cod_usuario = [];	
		$i = 0;
		while($tb_status = mysqli_fetch_array($status)) {
		     $id_reserva[$i] = $tb_status['id_reserva'];
		     $cod_usuario[$i] = $tb_status['cod_usuario'];
		     $i++;
    }

	$data = "20".date("y-m-d H:i:s");

    $update = "UPDATE reserva
			   SET STATUS = '3', cancelamento = '1', dthr_cancelamento = '$data', resp_cancelamento = '$cod_usuario[0]'
			   WHERE id_reserva = '$id_reserva[0]'";

	$update = mysqli_query($conexao, $update) or die ("Erro ao conectar");

	mysql_close($conexao);

	header('Location: ../view/perfil-usuario-admin.php?cd='.$cd);

?> 