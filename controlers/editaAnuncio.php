<?php
		include "../model/conexao.php";
		include '../controlers/validaPost.php';

		$id = $_GET['id'];
		$id_anuncio = $_GET['idanuncio'];		

		if(isset($_POST['cadastro'])){

			$titulo = validaPost('titulo');	
			$preco = validaPost('preco');
			$preco = str_replace("R$", "", $preco);
			$preco = str_replace(".", "", $preco);
			$preco = str_replace(",", "", $preco);
			$preco = $preco/100;
			$descricao = validaPost('descricao');
			$especialidade = validaPost('classificacao');
			$especialidade = (int) $especialidade;		
			isset($_FILES['arquivo']) ? $_FILES['arquivo'] : '';
			$dt_hora = date('Y-m-d H:i:s');

			//Select UF da empresa
			$uf_empresa = "SELECT estado FROM pessoa_juridica WHERE cod_empresa = '$id'";
			$sql_query = mysqli_query($conexao, $uf_empresa) or die ("Erro ao conectar &raquo; " . mysql_error());

			$tb_empresa = mysqli_fetch_array($sql_query);
			$uf = $tb_empresa[0];			

			//Seleciona clique e hora de criação
			$select = "SELECT clique,created_at FROM anuncio WHERE cod_empresa ='$id' AND id_anuncio ='$id_anuncio' ";
			$sql_query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());

			$tb_anuncio = mysqli_fetch_array($sql_query);
			$clique = $tb_anuncio[0];
			$created_at = $tb_anuncio[1];

			//Passando o caminho das imagens			
			if(!empty($_FILES['arquivo']['name'])){
            	$imagem = "searchfood/view/images/" . $_FILES['arquivo']['name'];
        	}else{
	            $select = "SELECT imagem FROM anuncio WHERE cod_empresa ='$id' AND id_anuncio ='$id_anuncio'";
	            $imagem = mysqli_query($conexao, $select) or die ("erro ao conectar");
	            $tb_anuncio = mysqli_fetch_array($imagem);
	            $imagem = $tb_anuncio[0];
        	}

			//Verificando a classificação do valor da oferta
			if($preco < 50.01){
				$id_valor = "1";
			}elseif($preco > 50 && $preco < 150.01){
				$id_valor = "2";
			}elseif($preco > 150 &&  $preco< 250.01){
				$id_valor = "3";
			}else{
				$id_valor = "4";
			}		

			$update = "UPDATE anuncio
					SET id_anuncio='$id_anuncio', imagem='$imagem', cod_empresa='$id',  clique = '$clique', id_especialidade ='$especialidade', valor='$preco', estado='$uf', descricao='$descricao', ativo='1', id_valor='$id_valor', created_at='$created_at', titulo='$titulo'
					WHERE cod_empresa ='$id' AND id_anuncio ='$id_anuncio'";

			$sql = mysqli_query($conexao, $update);

			if($sql){
				move_uploaded_file($_FILES['arquivo']['tmp_name'], '../view/images/' . $_FILES['arquivo']['name']);
			}

		  	header('Location: ../view/pessoa-jurica-admin-edita-anuncio.php?id=' . $id . "&idanuncio=".$id_anuncio);
		}
?> 		
