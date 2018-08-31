<?php
		include "../model/conexao.php";
		include '../controlers/validaPost.php';	

		if(isset($_POST['incluir'])){

			$dt_doc = validaPost('dt-Doc');
			$num_transacao = validaPost('numTransacao');
			$cod_empresa = validaPost('estabelecimento');
			$valor = validaPost('valor');
			$plano = validaPost('plano');
			$bandeira = validaPost('bandeira');
			$cod_autorizacao = str_pad(mt_rand(1,100000), 11, "0IKJ", STR_PAD_LEFT);
			$created_at = date("y-m-d");
			if($plano === "1"){
    					$contrato = "0000.1233.3234.12";
     					$dt_validade = date('Y-m-d', strtotime("+30 days"));
    		}elseif($plano === "2"){
    					$contrato = "0000.3334.1111.56";     			
     					$dt_validade = date('Y-m-d', strtotime("+70 days"));
    		}else{
    					$contrato = "0000.6546.2423.01";    					
  					    $dt_validade = date('Y-m-d', strtotime("+100 days"));	
   			}


			$insert= "INSERT INTO transacoes (created_at, dt_transacao, forma_pagamento, bandeira, contrato, plano, valor, validade_plano, cod_autorizacao, num_transacao, cod_empresa)
			VALUES ('$created_at', '$dt_doc', 'debito', '$bandeira','$contrato', '$plano', '$valor', '$dt_validade', '$cod_autorizacao', '$num_transacao', '$cod_empresa')";

			$sql = mysqli_query($conexao, $insert);

			header('Location: ../view/perfil-admin-contas-a-receber.php?id=9');
		}
?> 		
