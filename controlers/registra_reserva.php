<?php
	include "validaPost.php";

	if(!isset($_SESSION))
		session_start();

	$id = $_GET['id'];
	$email = $_SESSION['email'];
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
			header('Location: ../view/reserva.php?id='. $id . '&status=0');
		}else{
				include "../model/conexao.php";
				$email = $_SESSION['email'];
				$numCartao = validaPost('numCartao');
				$bandeira = validaPost('bandeira');
				$dt_reserva = validaPost('dtReserva');
				$especialidade = validaPost('especialidade');
				$qtdePessoas = validaPost('qtdePessoas');	
				$nomeTitular = validaPost('nomeTitular');
				$validade = validaPost('validade');
				$codSeguranca = validaPost('codSeguranca');	

				$select = "SELECT cod_usuario from pessoa_fisica where email ='$email'";
				$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());
				
				$id_usuario = [];	
				$i = 0;
				while($tb_usuario = mysqli_fetch_array($query)) {
					$id_usuario[$i] = $tb_usuario['cod_usuario'];
					$i++;
			    }

				$insert = "INSERT INTO reserva (dt_reserva, cod_usuario, cod_empresa, qtd_pessoa, hr_reserva, status, cancelamento, avaliado ) 
				VALUES ('$dt_reserva', '$id_usuario[0]', '$id', '$qtdePessoas', '$especialidade', '0', '0', '0')";
				$query = mysqli_query($conexao, $insert);
				header('Location: ../view/cadastro_sucess.php');
		}
	}
?> 