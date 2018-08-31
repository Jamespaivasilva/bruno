<?php
	include "searchfood/model/conexao.php";

    $query = "SELECT especialidade from especialidade order by id_especialidade;";
    $sql_query = mysqli_query($conexao, $query) or die (mysqli_error($conexao));

    $especialidade=[];
    $i = 0;
    while($tb_clientes = mysqli_fetch_array($sql_query)) {
        $especialidade[$i] = $tb_clientes['especialidade'];
        $i++;
    }

    $i = 0;
    while($i <  count($especialidade, COUNT_RECURSIVE)){
    	echo "<div class='checkbox margin-left-20px'>
            <label>
            	<input type='checkbox' value='$i' name='$especialidade[$i]'>
                	$especialidade[$i]
                </label>
       	</div>"; 
    	$i++;
    }
?>