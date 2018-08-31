<?php
	include "../model/conexao.php";

    $query = "SELECT especialidade, id_especialidade from especialidade order by id_especialidade;";
    $sql_query = mysqli_query($conexao, $query) or die ("Erro ao conectar");

    $especialidade=[];
    $id_especialidade=[];
    $i = 0;
    while($tb_clientes = mysqli_fetch_array($sql_query)) {
        $especialidade[$i] = $tb_clientes['especialidade'];
        $id_especialidade[$i] = $tb_clientes['id_especialidade'];
        $i++;
    }

    $i = 0;
    while($i <  count($especialidade, COUNT_RECURSIVE)){
    	echo "
    		<option value='$id_especialidade[$i]'>$especialidade[$i]</option>
    	";
    	$i++;
    }
?>