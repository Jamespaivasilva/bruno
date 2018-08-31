<?php
	include '../model/conexao.php';
	$cod_usuario = $_GET['cd'];

	$select = "SELECT razao_social, dt_reserva, hr_reserva, status 
				FROM reserva
				INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
				WHERE cod_usuario = '$cod_usuario'";
	$query = mysqli_query($conexao, $select) or die ("erro ao conectar");

	$razao_social = [];
	$dt_reserva = [];
	$hr_reserva = [];
	$status = [];
	$i = 0;

	while($tb_reserva = mysqli_fetch_array($query)){
		$razao_social[$i] = $tb_reserva['razao_social'];
		$dt_reserva[$i] = date('d/m/Y', strtotime($tb_reserva['dt_reserva']));
		$hr_reserva[$i] = $tb_reserva['hr_reserva'];
		$status[$i] = $tb_reserva['status'];

     	if ($status[$i] === "0") {
     		$status[$i] =  "Aguardando aprovação";
     	}elseif($status[$i] === "1"){
     		$status[$i] =  "Aprovada";
     	}elseif ($status[$i] === "2") {
     		$status[$i] =  "Reprovada";
     	}elseif($status[$i] === "3"){
     		$status[$i] =  "Cancelado";
     	}else{
     		$status[$i] =  "";
     	} 
		$i++;
	}
	$i = 0;
	while($i <  count($status, COUNT_RECURSIVE)){
		echo "
		<div class='col-sm-12 col-md-6 margin-botton-20px'>
			<div class='row pad-top-bott borda-ver' style='font-weight: bold;margin-left: -10px;margin-right: -10px;'>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>Estabelecimento:</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>$razao_social[$i]</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>Data:</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>$dt_reserva[$i]</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>Horário:</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>$hr_reserva[$i]</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>Status:</p>
				</div>
				<div class='col-xs-6 quebra-linha-400px'>
					<p>$status[$i]</p>
				</div>
			</div>                                      
		</div> ";
		$i++;
	}
?>	
