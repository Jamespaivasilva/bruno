<?php
		include "../model/conexao.php";
		$id = $_GET['id'];
		$transacao = $_GET['tran'];

		$query = "SELECT cod_autorizacao, num_transacao, created_at, plano, valor, validade_plano FROM transacoes WHERE num_transacao = '$transacao' AND cod_empresa = '$id'";
		$sql_query = mysqli_query($conexao, $query) or die ("Erro ao conectar &raquo; " . mysql_error());

		$i = 0;
		while($tb_transacao = mysqli_fetch_array($sql_query)) {

		    $cod_autorizacao[$i] = $tb_transacao['cod_autorizacao'];
		    $num_transacao[$i] = $tb_transacao['num_transacao'];
		    $created_at[$i] = date('d/m/Y', strtotime($tb_transacao['created_at']));
		    $plano[$i] = $tb_transacao['plano'];

			if($plano[$i] === "1"){
				$plano[$i] = "Basic";
			}elseif($plano[$i] === "2"){
				$plano[$i] = "Standart";
			}elseif ($plano[$i] === "3") {
				$plano[$i] = "Gold";
			}else{
				$plano[$i] = "#ERROR";
			}

		    $valor[$i] = 'R$' . number_format($tb_transacao['valor'], 2);
		    $validade_plano[$i] = date('d/m/Y', strtotime($tb_transacao['validade_plano']));	

		    $i++;
    	}
?> 		
