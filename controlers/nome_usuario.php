<?php
	include "../model/conexao.php";
	
	$id = $_GET['id'];

	$imagem = "SELECT nome, foto_perfil, comentario from pessoa_fisica INNER JOIN comentario ON comentario.cod_usuario = pessoa_fisica.cod_usuario INNER JOIN pessoa_juridica ON pessoa_juridica.cod_empresa = comentario.cod_empresa where pessoa_juridica.cod_empresa = '$id' limit 3";
	$sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar &raquo; " . mysql_error());

	$nome = [];
	$foto_perfil = [];
	$comentario = [];
	$i = 0;

	while($tb_imagem = mysqli_fetch_array($sql_query)) {
	    $nome[$i] = $tb_imagem['nome'];
	    $foto_perfil[$i] = $tb_imagem['foto_perfil'];
	    $comentario[$i] = $tb_imagem['comentario'];
	    $i++;
	}

	$i = 0;
    while ( $i <  count($nome, COUNT_RECURSIVE)) {
     	echo "
        	<div class='row margin-botton-20px'>
                <div class='col-xs-4 col-sm-4 col-md-4'>
                    <img src='$foto_perfil[$i]' style='width: 165px;  height: 90px' class='img-responsive'>
                </div>
                <div class='col-xs-8 col-sm-8 col-md-8'>
                    <h4> $nome[$i]  </h4>
                    <p>".$comentario[$i]."</p>
                </div>
            </div>";     	
         $i++;        
    } 	
?> 