<?php

	function horaReserva ($id) {
		include "../model/conexao.php";

     	$hr_reserva = "SELECT hr_reserva from pessoa_juridica 
						INNER JOIN reserva ON reserva.cod_empresa = pessoa_juridica.cod_empresa
						INNER JOIN pessoa_fisica ON pessoa_fisica.cod_usuario = reserva.cod_usuario
						where pessoa_fisica.email = '$id' ORDER by reserva.dt_reserva desc limit 1";

		$hr_reserva = mysqli_query($conexao, $hr_reserva) or die ("Erro ao conectar &raquo; " . mysql_error());

		$hora_reserva = [];	
		$i = 0;
		while($tb_hreserva = mysqli_fetch_array($hr_reserva)) {
		     $hora_reserva[$i] = $tb_hreserva['hr_reserva'];
		     $i++;
     	}

     	if(isset($hora_reserva[0])){
       		return $hora_reserva[0];
        }else{
        	return "Não possui reserva";
        }      		
  	} 
?> 