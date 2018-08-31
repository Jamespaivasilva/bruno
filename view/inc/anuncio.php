<?php	

	include "searchfood/controlers/validaPost.php";
	include "searchfood/controlers/select.php";
	include "searchfood/model/conexao.php";	

	if(!isset($_SESSION))
			session_start();

	//Verifica qual é a condição de checaquem do usuario

	// Verificar de as sessions forem vazias, retornar tudo que possui no banco
	if (!isset($_SESSION['especialidade']) and !isset($_SESSION['dolar']) and !isset($_SESSION['estado'])){

		$imagem = "SELECT imagem, id_anuncio, cod_empresa, valor, titulo FROM anuncio where ativo ='1'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar");

		$imagem = [];
		$i = 0;
		while($tb_imagem = mysqli_fetch_array($sql_query)) {
		    $imagem[$i] = $tb_imagem['imagem'];
		    $id[$i] = $tb_imagem['id_anuncio'];
		    $cod_empresa[$i] = $tb_imagem['cod_empresa'];
		    $valor[$i] = $tb_imagem['valor'];
		    $titulo[$i] = $tb_imagem['titulo'];
		    $i++;
    	}
		$valor = getMoeda($valor);

		$i = 0;
		$j = 0;
		while($i < count($cod_empresa, COUNT_RECURSIVE)){
			$nome_empresa = "SELECT nome_fantasia from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'";
			$query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar");

			while($tb_nome = mysqli_fetch_array($query)){
					$name_empresa[$i] = $tb_nome['nome_fantasia'];
				$j++;
			}
			$i++;
		}

		$i = 0;
		while ($i <  count($imagem, COUNT_RECURSIVE)) {  

			echo "  <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro pull-right'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                           <p class='oferta-hot' style='text-align: left;padding-left: 10px;'> $name_empresa[$i]</p>
                            <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$titulo[$i]</p>
                                <p class='preco-hot'>$valor[$i]</p>
                            </div>
                           <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'> <img src='$imagem[$i]' class='img-promo img-responsive' value='$id[$i]'> </a>
                        </div>
                        <div  class='link-promo'>
                            <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div> ";
			            $i++ ;
			}
	// Se o usuário clicar no botão pesquisar sem nenhum parametro, irá cair aqui. 
	}elseif ($_SESSION['especialidade'] === '           ' and $_SESSION['dolar'] === '   ' and $_SESSION['estado'] === '') {

		$imagem = "SELECT imagem, id_anuncio, cod_empresa, valor, titulo FROM anuncio where ativo ='1'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar");

		$imagem = [];
		$i = 0;
		while($tb_imagem = mysqli_fetch_array($sql_query)) {
		    $imagem[$i] = $tb_imagem['imagem'];
		    $id[$i] = $tb_imagem['id_anuncio'];
		    $cod_empresa[$i] = $tb_imagem['cod_empresa'];
		    $valor[$i] = $tb_imagem['valor'];
		    $titulo[$i] = $tb_imagem['titulo'];
		    $i++;
    	}
    	$valor = getMoeda($valor);
		
	    $i = 0;
		$j = 0;
	    while($i < count($cod_empresa, COUNT_RECURSIVE)){
			$nome_empresa = "SELECT nome_fantasia from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'";
			$query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar");

			while($tb_nome = mysqli_fetch_array($query)){
					$name_empresa[$i] = $tb_nome['nome_fantasia'];
				$j++;
			}
			$i++;
		}

		$i = 0;
		while ($i <  count($imagem, COUNT_RECURSIVE)) {  

			echo "  <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro pull-right'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                           <p class='oferta-hot' style='text-align: left;padding-left: 10px;'> $name_empresa[$i]</p>
                            <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$titulo[$i]</p>
                                <p class='preco-hot'>$valor[$i]</p>
                            </div>
                            <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'><a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'> <img src='$imagem[$i]' class='img-promo img-responsive' value='$id[$i]'> </a>
                        </div>
                        <div  class='link-promo'>
                            <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div> ";
			            $i++ ;
			}

	//Se for selecionado apenas o estado
	}elseif($_SESSION['especialidade'] === '           ' and $_SESSION['dolar'] === '   ' and $_SESSION['estado'] <> '') {

		$s_estado = $_SESSION['estado'];

		$imagem = "SELECT imagem, id_anuncio, cod_empresa, valor, titulo FROM anuncio where estado = '$s_estado' and ativo = '1'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar");

		$imagem = [];
	    $i = 0;

		while($tb_imagem = mysqli_fetch_array($sql_query)) {
		    $imagem[$i] = $tb_imagem['imagem'];
		    $id[$i] = $tb_imagem['id_anuncio'];
		    $cod_empresa[$i] = $tb_imagem['cod_empresa'];
		    $valor[$i] = $tb_imagem['valor'];
		    $titulo[$i] = $tb_imagem['titulo'];
		    $i++;
    	}
    	$valor = getMoeda($valor);

    	$i = 0;
		$j = 0;
	    while($i < count($cod_empresa, COUNT_RECURSIVE)){
			$nome_empresa = "SELECT nome_fantasia from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'";
			$query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar");

			while($tb_nome = mysqli_fetch_array($query)){
					$name_empresa[$i] = $tb_nome['nome_fantasia'];
				$j++;
			}
			$i++;
		}

     	if (!isset($s_estado)) {
			echo "Não possui restaurantes no filtro selecionado!";	
     	}else{
			$i = 0;
			while ($i <  count($imagem, COUNT_RECURSIVE)) {  

				echo "  <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro pull-right'>
	                    <div class='div-promocoes-hot margin-botton-20px'>
	                        <div>
	                           <p class='oferta-hot' style='text-align: left;padding-left: 10px;'> $name_empresa[$i]</p>
	                            <div class='div-nome-preco-hot'>
	                                <p class='nome-hot'>$titulo[$i]</p>
	                                <p class='preco-hot'>$valor[$i]</p>
	                            </div>
	                           <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'> <img src='$imagem[$i]' class='img-promo img-responsive' value='$id[$i]'> </a>
	                        </div>
	                        <div  class='link-promo'>
	                            <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
	                        </div>
	                    </div>
	                </div> ";
			    $i++ ;
			}
     	}	

    // Se tiver todos os parametros selecionados. 	
	}elseif($_SESSION['especialidade'] <> '           ' and $_SESSION['dolar'] <> '   ' and $_SESSION['estado'] <> ''){

		$s_espec = $_SESSION['especialidade'];
		$s_estado = $_SESSION['estado'];
		$s_valor = $_SESSION['dolar'];

		$s_espec = trim($s_espec) +1;


		$imagem = "SELECT imagem, id_anuncio, cod_empresa, valor, titulo FROM anuncio WHERE id_especialidade ='$s_espec' AND valor ='$s_valor' AND estado ='$s_estado' and ativo = '1'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar");

		$imagem = [];
	    $i = 0;

		while($tb_imagem = mysqli_fetch_array($sql_query)) {
		    $imagem[$i] = $tb_imagem['imagem'];
		    $id[$i] = $tb_imagem['id_anuncio'];
		    $cod_empresa[$i] = $tb_imagem['cod_empresa'];
		    $valor[$i] = $tb_imagem['valor'];
		    $titulo[$i] = $tb_imagem['titulo'];
		    $i++;
    	}
    	$valor = getMoeda($valor);

    	$i = 0;
		$j = 0;
	    while($i < count($cod_empresa, COUNT_RECURSIVE)){
			$nome_empresa = "SELECT nome_fantasia from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'";
			$query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar");

			while($tb_nome = mysqli_fetch_array($query)){
					$name_empresa[$i] = $tb_nome['nome_fantasia'];
				$j++;
			}
			$i++;
		}

		$i = 0;
		while ($i <  count($imagem, COUNT_RECURSIVE)) {  

			echo "  <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro pull-right'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                           <p class='oferta-hot' style='text-align: left;padding-left: 10px;'> $name_empresa[$i]</p>
                            <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$titulo[$i]</p>
                                <p class='preco-hot'>$valor[$i]</p>
                            </div>
                           <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'> <img src='$imagem[$i]' class='img-promo img-responsive' value='$id[$i]'> </a>
                        </div>
                        <div  class='link-promo'>
                            <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div> ";
			            $i++ ;
			}

    }else{

    	$imagem = "SELECT imagem, id_anuncio, cod_empresa, valor, titulo FROM anuncio where ativo ='1'";
		$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar");

		$imagem = [];
		$i = 0;
		while($tb_imagem = mysqli_fetch_array($sql_query)) {
		    $imagem[$i] = $tb_imagem['imagem'];
		    $id[$i] = $tb_imagem['id_anuncio'];
		    $cod_empresa[$i] = $tb_imagem['cod_empresa'];
		    $valor[$i] = $tb_imagem['valor'];
		    $titulo[$i] = $tb_imagem['titulo'];
		    $i++;
    	}
		$valor = getMoeda($valor);

		$i = 0;
		$j = 0;
		while($i < count($cod_empresa, COUNT_RECURSIVE)){
			$nome_empresa = "SELECT nome_fantasia from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'";
			$query = mysqli_query($conexao, $nome_empresa) or die ("Erro ao conectar");

			while($tb_nome = mysqli_fetch_array($query)){
					$name_empresa[$i] = $tb_nome['nome_fantasia'];
				$j++;
			}
			$i++;
		}

		$i = 0;
		while ($i <  count($imagem, COUNT_RECURSIVE)) {  

			echo "  <div class='col-xs-12 col-sm-6 col-md-3 alinha-centro pull-right'>
                    <div class='div-promocoes-hot margin-botton-20px'>
                        <div>
                           <p class='oferta-hot' style='text-align: left;padding-left: 10px;'> $name_empresa[$i]</p>
                            <div class='div-nome-preco-hot'>
                                <p class='nome-hot'>$titulo[$i]</p>
                                <p class='preco-hot'>$valor[$i]</p>
                            </div>
                           <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'> <img src='$imagem[$i]' class='img-promo img-responsive' value='$id[$i]'> </a>
                        </div>
                        <div  class='link-promo'>
                            <a href='searchfood/view/perfil-estabelecimento.php?id=$cod_empresa[$i]&idanuncio=$id[$i]'><i class='glyphicon glyphicon-chevron-left'></i>Reserve</a>
                        </div>
                    </div>
                </div> ";
			            $i++ ;
			}
    }	
?>