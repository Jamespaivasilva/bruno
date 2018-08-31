<?php

		include "../model/conexao.php";

		$id = $_GET['id'];

     	$usuario = "SELECT nome, id_reserva from pessoa_fisica 
						INNER JOIN reserva ON reserva.cod_usuario = pessoa_fisica.cod_usuario
						INNER JOIN pessoa_juridica ON pessoa_juridica.cod_empresa = reserva.cod_empresa
						where pessoa_juridica.cod_empresa= '$id' and status ='0'";

		$usuario = mysqli_query($conexao, $usuario) or die ("Erro ao conectar &raquo; " . mysql_error());

		$nome_usuario = [];
		$id_reserva = [];	
		$i = 0;
		while($tb_dado_usuario = mysqli_fetch_array($usuario)) {
		     $nome_usuario[$i] = $tb_dado_usuario['nome'];
		     $id_reserva[$i] = $tb_dado_usuario['id_reserva'];
		     $i++;
     	}

     	$i = 0;
		while($i <  count($id_reserva, COUNT_RECURSIVE)) {
		 	echo "<option value='$id_reserva[$i]'>$nome_usuario[$i]</option>";
			$i++;
     	}
?> 