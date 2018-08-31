<?php

    include '../model/conexao.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM transacoes WHERE cod_empresa = '$id'";
    $query = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");
    $query = $query->num_rows;

    if($query > 0){
        header('Location: pessoa-jurica-admin-intro-anuncios.php?id='. $id);
    }else{
        header('Location: pessoa-jurica-admin-anuncios-realizados.php?id='. $id);
    } 
    


?>