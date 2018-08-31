<?php

	function nomeEmpresaLoginPF ($id) {
		include "../model/conexao.php";

     	$nome_empresa = "SELECT nome_fantasia, dt_reserva, hr_reserva from pessoa_juridica 
						INNER JOIN reserva ON reserva.cod_empresa = pessoa_juridica.cod_empresa
						INNER JOIN pessoa_fisica ON pessoa_fisica.cod_usuario = reserva.cod_usuario
						where pessoa_fisica.email = '$id' ORDER by reserva.dt_reserva desc;";

		$nome_empresa = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar &raquo; " . mysql_error());

		$empresa = [];	
		$i = 0;
		while($tb_nomeFantasia = mysqli_fetch_array($nome_empresa)) {
		     $empresa[$i] = $tb_nomeFantasia['nome_fantasia'];
		     $i++;
     	}

     	if(isset($empresa[0])){
       		return $empresa[0];
        }else{
        	return "Não possui reserva";
        }      		
	} 
?> 