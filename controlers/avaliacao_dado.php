<?php
	function avalicaoDado () {
		include "../model/conexao.php";
		include "contagem_dados.php";
		
		$cod_empresa = $_GET['id'];

		$ava_positiva = "SELECT positiva from avaliacoes where cod_empresa = '$cod_empresa' and positiva = '1'";
		$ava_regular = "SELECT regular from avaliacoes where cod_empresa = '$cod_empresa' and regular = '1' ";
		$ava_negativa = "SELECT negativa from avaliacoes where cod_empresa = '$cod_empresa' and negativa = '1'";

		$q_positiva = mysqli_query($conexao, $ava_positiva) or die ("Erro ao conectar &raquo; " . mysql_error());
		$q_regular = mysqli_query($conexao, $ava_regular) or die ("Erro ao conectar &raquo; " . mysql_error());
		$q_negativa = mysqli_query($conexao, $ava_negativa) or die ("Erro ao conectar &raquo; " . mysql_error());

	   	$positiva = contarDados($q_positiva);
	   	$regular = contarDados($q_regular);
	   	$negativa = contarDados($q_negativa);

	   	$total = $positiva + $regular + $negativa;

	   	if ($positiva === 0) {
	   		$result_positiva = 0;
	   	}else{
	   		$result_positiva = $positiva * 100/$total;
	   	}

	   	if($regular === 0){
	   		$result_regular = 0;
	   	}else{
	   		$result_regular = $regular * 100/$total;
	   	}

	   	if ($negativa === 0) {
	   		$result_negativa = 0;
	   	}else {
	   		$result_negativa = $negativa * 100/$total;
	   	}

	   	echo "
	   	<h4>Avaliações</h4>
            <p>Positiva</p>
                <div class='progress'>
                   	<div class='progress-bar' role='progressbar' aria-valuenow='70'
                      aria-valuemin='0' aria-valuemax='100' style='width:$result_positiva%'>
                        <span class='sr-only'>70% Complete</span>
                      </div>
                    </div>
                    
                    <p>Regular</p>
                    <div class='progress'>
                      <div class='progress-bar' role='progressbar' aria-valuenow='70'
                      aria-valuemin='0' aria-valuemax='100' style='width:$result_regular%'>
                        <span class='sr-only'>70% Complete</span>
                      </div>
                    </div>
                    
                    <p>Negativa</p>
                    <div class='progress'>
                      <div class='progress-bar' role='progressbar' aria-valuenow='70'
                      aria-valuemin='0' aria-valuemax='100' style='width:$result_negativa%'>
                        <span class='sr-only'>70% Complete</span>
                    </div>
        </div> ";

        mysqli_close($conexao);
	} 
?> 