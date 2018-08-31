<?php

	function dtReserva ($id) {
		include "../model/conexao.php";

     	$dt_reserva = "SELECT dt_reserva from pessoa_juridica 
						INNER JOIN reserva ON reserva.cod_empresa = pessoa_juridica.cod_empresa
						INNER JOIN pessoa_fisica ON pessoa_fisica.cod_usuario = reserva.cod_usuario
						where pessoa_fisica.email = '$id' ORDER by reserva.dt_reserva desc limit 1";

		$dt_reserva = mysqli_query($conexao, $dt_reserva) or die ("Erro ao conectar &raquo; " . mysql_error());

		$d_reserva = [];	
		$i = 0;
		while($tb_dreserva = mysqli_fetch_array($dt_reserva)) {
		     $d_reserva[$i] = $tb_dreserva['dt_reserva'];
		     $i++;
     	}
     	
     	if(isset($dt_reserva)){
	     	$dia = substr($d_reserva[0], 8, 2);
	     	$mes = substr($d_reserva[0], 5, 2);
	     	$ano = substr($d_reserva[0], 0, 4); 
      		return $data = $dia . "/" . $mes . "/" . $ano;
        }else{
        	return "Não possui reserva";
        }  	

        mysqli_close($conexao);
  	} 
?> 