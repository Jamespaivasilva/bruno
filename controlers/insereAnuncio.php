<?php
		include "../model/conexao.php";
		include '../controlers/validaPost.php';

		$id = $_GET['id'];		

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
			$_FILES['arquivo'];			
			$dt_hora = date('Y-m-d H:i:s');


			//Select UF da empresa
			$uf_empresa = "SELECT estado FROM pessoa_juridica WHERE cod_empresa = '$id'";
			$sql_query = mysqli_query($conexao, $uf_empresa) or die ("Erro ao conectar &raquo; " . mysql_error());

			$tb_empresa = mysqli_fetch_array($sql_query);
			$uf = $tb_empresa[0];
			

			//Select do ultimo id_anuncio e acrescentando mais um, pois o auto increment está na coluna ID. 
			$select = "SELECT id_anuncio FROM anuncio ORDER BY id DESC";
			$sql_query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());

			$tb_anuncio = mysqli_fetch_array($sql_query);
			$ultimo_id = $tb_anuncio[0];
			$ultimo_id += 1;

			//passando o caminho das imagens
			$imagem = "searchfood/view/images/" . $_FILES['arquivo']['name'];

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

			$insert= "INSERT INTO anuncio (id_anuncio, imagem, cod_empresa, clique, id_especialidade, valor, estado, descricao, ativo, id_valor, created_at, titulo)
			VALUES ('$ultimo_id', '$imagem', '$id', '0','$especialidade', '$preco', '$uf', '$descricao', '1', '$id_valor', '$dt_hora', '$titulo')";

			$sql = mysqli_query($conexao, $insert);

			if($sql){
				move_uploaded_file($_FILES['arquivo']['tmp_name'], '../view/images/' . $_FILES['arquivo']['name']);
			}

			header('Location: ../view/pessoa-jurica-admin.php?id=' . $id);
		}
?> 		
