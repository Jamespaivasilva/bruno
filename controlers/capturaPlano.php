<?php
	include "../model/conexao.php";
	include "../controlers/validaPost.php";

	$id = $_GET['id'];
	$plano = validaPost('plano');

	header('Location: ../view/pessoa-jurica-admin-contratar-plano.php?id='.$id . '&plano='. $plano);	

?> 		
