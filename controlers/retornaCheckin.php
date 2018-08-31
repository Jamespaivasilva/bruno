<?php
	include "../model/conexao.php";
	$cd = isset($_GET['cd']) ? $_GET['cd'] :'';

	$select = " SELECT id_reserva, razao_social, dt_reserva, hr_reserva, avaliado
				FROM reserva
				INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
				WHERE cod_usuario = '$cd'";
    $query = mysqli_query($conexao, $select) or die ("Erro ao conectar");

    $id_reserva = [];
    $razao_social = [];
    $dt_reserva = [];
    $hr_reserva = [];
    $avaliado = [];
    $i = 0;

    while($tb_check = mysqli_fetch_array($query)){
        $id_reserva[$i] = $tb_check['id_reserva'];
    	$razao_social[$i] = $tb_check['razao_social'];
    	$dt_reserva[$i] = date('d/m/Y', strtotime($tb_check['dt_reserva']));
    	$hr_reserva[$i] = $tb_check['hr_reserva'];
    	$avaliado[$i] = $tb_check['avaliado'];

    	$i++;
    }

    $i = 0;
    while($i <  count($avaliado, COUNT_RECURSIVE)){
    	if($avaliado[$i] === "0"){
    		echo "
    		<div class='col-sm-6 margin-botton-20px' style='border-right: 2px solid #bc2026;'>
			<div class='row margin-botton-20px'>
				<div class='col-sm-12 col-md-8' >
					<p>$razao_social[$i]</p>
					<p>$dt_reserva[$i] - $hr_reserva[$i]</p>
				</div>
				<div class='col-sm-12 col-md-4'>
				<a href='perfil-usuario-admin-avaliacao.php?cd=$cd&reserva=$id_reserva[$i]'> <button class='btn btn-cadastro' style='margin-top: 8px;'>Avalie já</button></a> 
				</div>
			</div>
			</div>";
    	}else{
    		echo "
    		<div class='col-sm-6 margin-botton-20px' style='border-right: 2px solid #bc2026;'>
    		<div class='row margin-botton-20px'>
                 <div class='col-sm-12 col-md-8'>
					<p>$razao_social[$i]</p>
					<p>$dt_reserva[$i] - $hr_reserva[$i]</p>
                 </div>
                 <div class='col-sm-12 col-md-4'>
                    <h4 class='btn'style='margin-top: 8px; color: red'> <strong> Avaliado </strong> </h2>
                 </div>
             </div>
             </div>";
    	}
    	$i++;
   	}
?> 		
