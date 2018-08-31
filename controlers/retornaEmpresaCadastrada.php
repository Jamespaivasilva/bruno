<?php
	include '../model/conexao.php';

	$query = isset($_GET['query']) ? $_GET['query'] : '';

	if($query != ''){
		$r_query = mysqli_query($conexao, $query) or die ("Erro ao conectar &raquo; " . mysql_error());
		$contador = $r_query->num_rows;

		$cod_empresa = [];
		$razao_social = [];
		$nome_fantasia = [];
		$cnpj = []; 
		$cep = []; 
		$endereco = []; 
		$telefone = [];
	    $i = 0;

	    while($tb_cliente = mysqli_fetch_array($r_query)) {
	    	$cod_empresa[$i] = $tb_cliente['cod_empresa'];
	        $razao_social[$i] = $tb_cliente['razao_social'];
	        $nome_fantasia[$i] = $tb_cliente['nome_fantasia'];
	        $cnpj[$i] = $tb_cliente['cnpj'];
	        $cep[$i] = $tb_cliente['cep'];
	        $endereco[$i] = $tb_cliente['endereco'];
	        $telefone[$i] = $tb_cliente['telefone'];

	        $i++;
	    }	

		if($contador <> 0){
			echo 
				"<table class='table table-bordered'>
					<thead>
						<tr>
							<td>Cod_cliente</td>
							<td>Razão Social</td>
							<td>Nome Fantasia</td>
							<td>CNPJ</td>
							<td>CEP</td>
							<td>Endereço</td>
							<td>Celular</td>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>$cod_empresa[0] </td>
							<td>$razao_social[0]</td>
							<td>$nome_fantasia[0]</td>
							<td>$cnpj[0]</td>
							<td>$cep[0]</td>
							<td>$endereco[0]</td>
							<td>$telefone[0]</td>
						</tr>
					</tbody>
	          	</table>";
		}else{
			echo "Não localizado";
		}

	}else{

		echo "<table class='table table-bordered'>
		                                     <thead>
		                                         <tr>
		                                           <td> Id Empresa </td>
		                                           <td>Cod_cliente</td>
		                                           <td>Razão Social</td>
		                                           <td>Nome Fantasia</td>
		                                           <td>CNPJ</td>
		                                           <td>CEP</td>
		                                           <td>Endereço</td>
		                                           <td>Celular</td>
		                                         </tr>
		                                     </thead>
		                                     
		                                  <tbody>
		                                         <tr>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                         </tr>
		                                         <tr>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                         </tr>
		                                         <tr>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                         </tr>
		                                         <tr>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                           <td></td>
		                                         </tr>
		                                     </tbody>
		                                  </table>";
	}
?>