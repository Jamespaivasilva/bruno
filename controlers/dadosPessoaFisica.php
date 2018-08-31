<?php

	function dadosPessoaFisica($posicao){
		include "../model/conexao.php";
		$id = $_GET['cd'];

		//nome -> [0]
		//email -> [1] 
		//dtNascimento -> [2]
		//contato -> [3]
		//pergunta -> [4]
		//resposta -> [5]
		//cep -> [6]
		//endereco -> [7]
		//complemento -> [8]
		//uf -> [9]
		//especialidade -> [10]

		$cliente = "SELECT nome, email, dtNascimento, contato, pergunta, resposta, cep, endereco, complemento,uf, especialidade 
					FROM pessoa_fisica
					WHERE cod_usuario = '$id'";
		$sql_query = mysqli_query($conexao, $cliente) or die ("Erro ao conectar &raquo; " . mysql_error());

		$tb_dados = mysqli_fetch_array($sql_query);

		return $tb_dados[$posicao];	  
	} 

?> 		
