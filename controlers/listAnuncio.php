<?php
		include "../model/conexao.php";
		include "../controlers/getMoeda.php";
		
		$id = $_GET['id'];

		$select = "SELECT imagem, titulo, valor, id_anuncio from anuncio where cod_empresa='$id' and ativo='1'";
		$query = mysqli_query($conexao, $select) or die ("Erro ao conectar &raquo; " . mysql_error());

		$foto = [];
		$titulo = [];
		$preco = [];
		$id_anuncio = [];
		
		$i = 0;
		while($tb_anuncio = mysqli_fetch_array($query)) {
		    $foto[$i] = $tb_anuncio['imagem'];
		    $titulo[$i] = $tb_anuncio['titulo'];
		    $preco[$i] = $tb_anuncio['valor'];
		    $id_anuncio[$i] = $tb_anuncio['id_anuncio'];

		    $i++;
    	}
		
		$preco = getMoeda($preco);
    	 
    	$i = 0; 
    	if(empty($titulo)){
    		echo " Você não possui anúncio. </br>
    			   Para informações de planos e inúmeras vantagens <a href='pessoa-jurica-admin-contratar-plano.php?id=$id'> CLIQUE AQUI </a>.";
    	}else{
	    	while ($i <  count($titulo, COUNT_RECURSIVE)){
		    	echo "<div class='col-xs-12 col-sm-12 col-md-6' style='padding-left: 20px;padding-right: 20px;text-align: left; margin-bottom: 20px;'>
		                                      <div class='row borda-ver-admin'>
		                                          <div style='float: left;padding-top: 15px'>
	                                                <form method='post' action='../controlers/manipularAnuncio.php?id=$id&list=$id_anuncio[$i]'>
	                                                  <div class='col-xs-4'>
		                                                  <img src='$foto[$i]' name='foto' value='$id_anuncio[$i]' class='img img-responsive img-anun-realizado'>
		                                              </div>
		                                              <div class='col-xs-4'>
		                                                  <p>Titulo anúncio</p>
		                                              </div>
		                                              <div class='col-xs-4'>
		                                                  <p>$titulo[$i]</p>
		                                              </div>	                                              
		                                              <div class='col-xs-4'>
		                                                  <p>Preço:</p>
		                                              </div>
		                                              <div class='col-xs-4'>
		                                                  <p>$preco[$i]</p>
		                                              </div>
		                                              <input type='hidden' name='hiden' value='$id_anuncio[$i]'>
		                                              <div class='col-xs-4'>
											<p><button type='submit' name='editar' class='btn btn-cadastro botao-topo-cadastro'>Editar</button></p>		                                              </div>
		                                              <div class='col-xs-4'>
		                                                  <p><button type='submit' name='excluir' class='btn btn-cadastro botao-topo-cadastro'>Excluir</button></p>
		                                              </div>
	                                                </form>		                                              
		                                          </div>                                          
		                                      </div>
		                                  </div>
		                             ";
		                                  $i++;
	    }}


   	mysqli_close($conexao);

?> 