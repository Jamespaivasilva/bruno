<?php
    include "../model/conexao.php";

    $id = $_GET['id']; 

    $imagem = "SELECT caminho from galeria INNER JOIN pessoa_juridica ON galeria.cod_empresa = pessoa_juridica.cod_empresa where pessoa_juridica.cod_empresa = '$id' limit 6"; 
    $sql_query = mysqli_query($conexao, $imagem) or die ("Erro ao conectar");

    $imagem = [];
    $i = 0;

    while($tb_imagem = mysqli_fetch_array($sql_query)) {
        $imagem[$i] = $tb_imagem['caminho'];
        $i++;
    }

    $i = 0;
    while ( $i <  count($imagem, COUNT_RECURSIVE)) {
        echo "
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <a href='$imagem[$i]'><img src='$imagem[$i]' class='thumbnail' style='width: 250px;  height: 170px'></a>
            </div>";
        $i++;        
    }   
?>