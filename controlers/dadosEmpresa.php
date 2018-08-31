<?php

	function dadosEmpresa($posicao){
		include "../model/conexao.php";
		$id = $_GET['id'];
		$cod_empresa = isset($_GET['cod_empresa']) ? $_GET['cod_empresa'] : '' ;

		if($id === "9"){
			$id = $cod_empresa;
		}

		$dados_empresa = "SELECT razao_social, nome_fantasia, estabelecimento, classificacao, cep, endereco, complemento, numero, bairro, dtAbertura, conta, agencia,banco, bandeira, telefone, celular, email, senha, pergunta, resposta, cod_empresa, estado, foto_empresa, cnpj from pessoa_juridica where cod_empresa = '$id'";
		$sql_query = mysqli_query($conexao, $dados_empresa) or die ("Erro ao conectar &raquo; " . mysql_error());

		$tb_dados = mysqli_fetch_array($sql_query);

		return $tb_dados[$posicao];	  
	} 

?> 		
