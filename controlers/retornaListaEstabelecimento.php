<?php
	include '../model/conexao.php';
	
	$select = "SELECT cod_empresa, razao_social from pessoa_juridica";
	$query = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");

	$i = 0;
	while($tb_estab = mysqli_fetch_array($query)) {
		     $razao[$i] = $tb_estab['razao_social'];
		     $cod[$i] = $tb_estab['cod_empresa'];
		     $i++;
    }

    $i = 0;
    while($i <  count($razao, COUNT_RECURSIVE)){
    	echo "
    		<option value='$cod[$i]'>$razao[$i]</option>
    	";
    	$i++;
    }



?>