<?php
	include "../model/conexao.php";
	include "../controlers/validaPost.php";	

	$id = $_GET['id'];
	$dia = validaPost('dias');	

		$reserva = "SELECT * FROM reserva WHERE cancelamento = '0' AND cod_empresa ='$id'";
		$query =  mysqli_query($conexao, $reserva) or die ("Erro ao conectar &raquo; " . mysql_error());
		$reservas = $query->num_rows;

		$cancelamento = "SELECT * FROM reserva WHERE cancelamento = '1' AND cod_empresa ='$id'";
		$c_query =  mysqli_query($conexao, $cancelamento) or die ("Erro ao conectar &raquo; " . mysql_error());
		$cancelamento = $c_query->num_rows;

		$checkin = "SELECT * FROM avaliacoes WHERE cod_empresa = '$id'";
		$c_query =  mysqli_query($conexao, $checkin) or die ("Erro ao conectar &raquo; " . mysql_error());
		$checkin = $c_query->num_rows;

		mysqli_close($conexao);

?> 		
