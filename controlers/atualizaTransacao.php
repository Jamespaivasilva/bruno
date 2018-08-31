<?php
		include "../model/conexao.php";
		include "../controlers/validaPost.php";

		if(isset($_POST['enviar'])){
			$preco = validaPost('preco');
			$preco = str_replace(".", "", $preco);
			$preco = str_replace(",", "", $preco);
			$preco = str_replace("R$", "", $preco);
			$preco = $preco/100;
			$especialidade = validaPost('classificacao');
			$descricao = validaPost('descricao');
			$id_anuncio = $_GET['idanuncio'];

			if(!empty($_FILES['arquivo']['name'])){
	                $imagem = "searchfood/view/images/" . $_FILES['arquivo']['name'];
            }else{
                $select = "SELECT imagem FROM anuncio WHERE id_anuncio = '$id_anuncio'";
                $imagem = mysqli_query($conexao, $select) or die ("erro ao conectar");
                $tb_anuncio = mysqli_fetch_array($imagem);
                $imagem = $tb_anuncio[0];
        	}

	        $query =  "UPDATE anuncio SET valor = '$preco', id_especialidade = '$especialidade', descricao = '$descricao', imagem = '$imagem' 
	        		   WHERE id_anuncio = '$id_anuncio'";
	       	$execute = mysqli_query($conexao, $query) or die ("ERRO AO CONECTAR");

	       	if($execute){
            	move_uploaded_file($_FILES['arquivo']['tmp_name'], '../view/images/' . $_FILES['arquivo']['name']);
        	}

            header('Location: ../view/perfil-admin-cadastros-anunciantes-alterar.php?id=9&idempresa=' . $id_anuncio);
		}
?> 