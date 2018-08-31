<?php
	include '../model/conexao.php';

	$id_user = isset($_GET['iduser']) ? $_GET['iduser'] : NULL;
	$contador = isset($_GET['contador']) ? $_GET['contador'] : NULL;
	
	if(isset($id_user)){
		$query = "SELECT id_reserva, nome, dt_reserva, hr_reserva, nome_fantasia
				  FROM reserva
				  INNER JOIN pessoa_fisica ON reserva.cod_usuario = pessoa_fisica.cod_usuario
			      INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa
			      WHERE id_reserva =  '$id_user'";

		$r_query = mysqli_query($conexao, $query) or die ("Erro ao conectar &raquo; " . mysql_error());

		$id = [];
		$nome = [];
		$dt_reserva = [];
		$hr_reserva = []; 
		$nome_fantasia = []; 
	    $i = 0;

	    while($tb_cliente = mysqli_fetch_array($r_query)) {
	    	$id[$i] = $tb_cliente['id_reserva'];
	        $nome[$i] = $tb_cliente['nome'];
	        $dt_reserva[$i] = date('d/m/Y', strtotime($tb_cliente['dt_reserva']));
	        $hr_reserva[$i] = $tb_cliente['hr_reserva'];
	        $nome_fantasia[$i] = $tb_cliente['nome_fantasia'];


	        $i++;
	    }	

		if($id_user <> ''){
			echo 
				"<table class='table table-bordered'>
					<thead>
						<tr>
							<td>Id</td>
							<td>Nome Usuário</td>
                            <td>Data</td>
                            <td>Horário</td>
							<td>Nome Estabelecimento</td>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>$id[0] </td>
							<td>$nome[0] </td>
							<td>$dt_reserva[0]</td>
							<td>$hr_reserva[0]</td>
							<td>$nome_fantasia[0]</td>
						</tr>
					</tbody>
	          	</table>";
		}else{
			echo "Não localizado";
		}

	}else{
		$seleciona = "SELECT id_reserva, nome, dt_reserva, hr_reserva, nome_fantasia
				  FROM reserva
				  INNER JOIN pessoa_fisica ON reserva.cod_usuario = pessoa_fisica.cod_usuario
			      INNER JOIN pessoa_juridica ON reserva.cod_empresa = pessoa_juridica.cod_empresa limit 4";
		$query = mysqli_query($conexao, $seleciona) or die ("Erro ao conectars");

		$id = [];
		$nome = [];
		$dt_reserva = [];
		$hr_reserva = []; 
		$nome_fantasia = []; 
	    $i = 0;

	    while($tb_cliente = mysqli_fetch_array($query)) {
	    	$id[$i] = $tb_cliente['id_reserva'];
	        $nome[$i] = $tb_cliente['nome'];
	        $dt_reserva[$i] = date('d/m/Y', strtotime($tb_cliente['dt_reserva']));
	        $hr_reserva[$i] = $tb_cliente['hr_reserva'];
	        $nome_fantasia[$i] = $tb_cliente['nome_fantasia'];
	        	

	        $i++;
	    }	

		echo "<table class='table table-bordered'>
		                                     <thead>
		                                         <tr>
		                                         	<td>Id</td>
													<td>Nome Usuário</td>
						                            <td>Data</td>
						                            <td>Horário</td>
													<td>Nome Estabelecimento</td>
		                                         </tr>
		                                     </thead>		                                     
		                                  <tbody>
		                                         <tr>
		                                           <td>$id[0]</td>
		                                           <td>$nome[0]</td>
		                                           <td>$dt_reserva[0]</td>
		                                           <td>$hr_reserva[0]</td>
		                                           <td>$nome_fantasia[0]</td>		                                          
		                                         </tr>
		                                         <tr>
		                                           <td>$id[1]</td>
		                                           <td>$nome[1]</td>
		                                           <td>$dt_reserva[1]</td>
		                                           <td>$hr_reserva[1]</td>
		                                           <td>$nome_fantasia[1]</td>		                                       
		                                         </tr>
		                                         <tr>
		                                           <td>$id[2]</td>
		                                           <td>$nome[2]</td>
		                                           <td>$dt_reserva[2]</td>
		                                           <td>$hr_reserva[2]</td>
		                                           <td>$nome_fantasia[2]</td>			                                           
		                                         </tr>
		                                         <tr>
		                                           <td>$id[3]</td>
		                                           <td>$nome[3]</td>
		                                           <td>$dt_reserva[3]</td>
		                                           <td>$hr_reserva[3]</td>
		                                           <td>$nome_fantasia[3]</td>			                                           
		                                         </tr>
		                                     </tbody>
		                                  </table>";
	}
?>