<?php
	include '../model/conexao.php';
	include '../controlers/validaPost.php';

	$radio = validaPost('radio');
	$de = validaPost('nome-estab-de');
	$ate = validaPost('nome-estab-ate');


	if($radio === "r1"){

		$select = "SELECT SUM(valor) FROM transacoes
			   	   WHERE created_at BETWEEN '$de' AND '$ate'";
		$result = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");
		
		$tb_result = mysqli_fetch_array($result);

		$tb_result[0] = number_format($tb_result[0], 2, ',', '.');

		header('Location: ../view/perfil-admin-receita.php?id=9&val='. $tb_result[0]);
	}elseif($radio === "r2"){

		$data = date("Y-m-d");

		$select = "SELECT DATE_SUB('$data', INTERVAL 90 DAY)";
		$result = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");		
		$dmenos90 = mysqli_fetch_array($result);

		$select2 = "SELECT SUM(valor)/3 FROM transacoes WHERE created_at BETWEEN '$dmenos90[0]' AND '$data'";
		$result = mysqli_query($conexao, $select2) or die ("ERRO AO CONECTAR");		

		$resultado = mysqli_fetch_array($result);

		$final = number_format($resultado[0], 2, ',', '.');

		header('Location: ../view/perfil-admin-receita.php?id=9&val='. $final);

	}elseif($radio === "r3"){

		header('Location: ../view/perfil-admin-receita.php?id=9&val=99,70');
		
	}else{
		header('Location: ../view/perfil-admin-receita.php?id=9&val=75,80');
	}
?>