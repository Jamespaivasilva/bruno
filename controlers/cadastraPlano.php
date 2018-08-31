<?php
	include '../model/conexao.php';
	include '../controlers/validaPost.php';

	$numCartao = validaPost('numCartao');
	$bandeira = validaPost('bandeira');

	validateCC($numCartao, $bandeira);

	function validateCC($cc_num, $type) {
		
		$id = $_GET['id'];

		if($type == "American") {
		$denum = "American Express";
		} elseif($type == "Dinners") {
		$denum = "Diner's Club";
		} elseif($type == "Discover") {
		$denum = "Discover";
		} elseif($type == "Master") {
		$denum = "Master Card";
		} elseif($type == "Visa") {
		$denum = "Visa";
		}

		if($type == "American") {
		$pattern = "/^([34|37]{2})([0-9]{13})$/";//American Express
		if (preg_match($pattern,$cc_num)) {
		$verified = true;
		} else {
		$verified = false;
		}


		} elseif($type == "Dinners") {
		$pattern = "/^([30|36|38]{2})([0-9]{12})$/";//Diner's Club
		if (preg_match($pattern,$cc_num)) {
		$verified = true;
		} else {
		$verified = false;
		}


		} elseif($type == "Discover") {
		$pattern = "/^([6011]{4})([0-9]{12})$/";//Discover Card
		if (preg_match($pattern,$cc_num)) {
		$verified = true;
		} else {
		$verified = false;
		}


		} elseif($type == "Master") {
		$pattern = "/^([51|52|53|54|55]{2})([0-9]{14})$/";//Mastercard
		if (preg_match($pattern,$cc_num)) {
		$verified = true;
		} else {
		$verified = false;
		}


		} elseif($type == "Visa") {
		$pattern = "/^([4]{1})([0-9]{12,15})$/";//Visa
		if (preg_match($pattern,$cc_num)) {
		$verified = true;
		} else {
		$verified = false;
		}

		}

		 if($verified == false){
		 	$id = $_GET['id'];
		 	$plano = $_GET['plano'];
		 	header('Location: ../view/pessoa-jurica-admin-contratar-plano.php?id='. $id . '&status=0&plano='. $plano);
		 }else{
				include "../model/conexao.php";
				$dt_hora = date("y-m-d");
				$dt_transacao = validaPost('dt_transicao');
				$forma_pagamento = validaPost('pagamento');
				$bandeira = validaPost('bandeira');
				$plano = $_GET['plano'];
				$transacao = str_pad(mt_rand(1,100000), 11, "0", STR_PAD_LEFT);
				$cod_empresa = $_GET['id'];
				$cod_autorizacao = str_pad(mt_rand(1,100000), 11, "0XZD", STR_PAD_LEFT);
				if($plano === "1"){
					$contrato = "0000.1233.3234.12";
					$valor_plano = 19.90;
					$dt_validade = date('Y-m-d', strtotime("+30 days"));
				}elseif($plano === "2"){
					$contrato = "0000.3334.1111.56";
					$valor_plano = 39.90;
					$dt_validade = date('Y-m-d', strtotime("+70 days"));
				}else{
					$contrato = "0000.6546.2423.01";
					$valor_plano = 55.90;
					$dt_validade = date('Y-m-d', strtotime("+100 days"));
				}		
						
				$insert = "INSERT INTO transacoes(created_at, dt_transacao, forma_pagamento, bandeira, contrato, plano, valor, validade_plano, cod_autorizacao, num_transacao,  cod_empresa)
						   VALUES ('$dt_hora','$dt_transacao', '$forma_pagamento', '$bandeira', '$contrato', '$plano', '$valor_plano', '$dt_validade','$cod_autorizacao', '$transacao' ,'$cod_empresa')";
				$query = mysqli_query($conexao, $insert);
				header('Location: ../view/pessoa-jurica-admin-planos-sucesso.php?id='.$cod_empresa . '&tran=' . $transacao);
		}
	}



?>