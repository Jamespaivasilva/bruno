<?php	
	$id = $_GET['id'];
	$id_anuncio = $_GET['list'];

	switch (get_post_action('editar', 'excluir')) {
	    case 'editar':      
	        header('Location: ../view/pessoa-jurica-admin-edita-anuncio.php?id='. $id. "&idanuncio=" .$id_anuncio);
	        break;

	    case 'excluir':
	      	excluirAnuncio($id_anuncio, $id);
	      	header('Location: ../view/pessoa-jurica-admin.php?id='. $id);
	        break;

	    default:
	        echo "defalut";
	}

	function get_post_action($name){
	    $params = func_get_args();

	    foreach ($params as $name) {
	        if (isset($_POST[$name])) {
	            return $name;
	        }
	    }
	}

	function excluirAnuncio($id_anuncio, $id){
		include '../model/conexao.php';
		$update = "UPDATE anuncio SET ativo = '0' WHERE id_anuncio = '$id_anuncio' and cod_empresa = '$id'";
		mysqli_query($conexao, $update);
	}

?> 