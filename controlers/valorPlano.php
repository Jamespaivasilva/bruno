<?php
	include "../model/conexao.php";
	
	$plano = isset($_GET['plano']) ? $_GET['plano'] : NULL;

	if($plano === "1"){
		echo "R$ 19,90";
	}elseif($plano === "2"){
		echo "R$ 39,90";
	}elseif($plano === "3"){
		echo "R$ 55,90";
	}else{
		echo "R$ XX,XX";
	}

?> 		
