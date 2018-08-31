<?php
		include "../model/conexao.php";
		include '../controlers/validaPost.php';

		$id = $_GET['id'];
		$cliente = validaPost('cliente');


		var_dump($id);
		var_dump($cliente);
?> 