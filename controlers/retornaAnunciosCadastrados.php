<?php
	include '../model/conexao.php';

	$id_empresa = isset($_GET['idempresa']) ? $_GET['idempresa'] : '';

	if($id_empresa != ''){
		$query = "SELECT id_anuncio, cod_empresa, created_at FROM anuncio WHERE id_anuncio = '$id_empresa'";
		$r_query = mysqli_query($conexao, $query) or die ("Erro ao conectar &raquo; " . mysql_error());
		$contador = $r_query->num_rows;

		$id_anuncio = [];
		$estabelecimento = [];
		$data = [];

	    $i = 0;

	    while($tb_cliente = mysqli_fetch_array($r_query)) {
	    	$id_anuncio[$i] = $tb_cliente['id_anuncio'];
	        $estabelecimento[$i] = $tb_cliente['cod_empresa'];
	        $data[$i] = $tb_cliente['created_at'];
	      
	        $i++;
	    }
	  	$data = date('d/m/Y', strtotime($data[0]));

	    $query2 = "SELECT nome_fantasia FROM pessoa_juridica WHERE cod_empresa = $estabelecimento[0]";
	    $r_query = mysqli_query($conexao, $query2) or die ("Erro ao conectar &raquo; " . mysql_error());
	    $tb_empresa = mysqli_fetch_array($r_query);

		if($contador <> 0){
			echo 
				"<table class='table table-bordered'>
					<thead>
						<tr>
							<td>Id Anuncio</td>
							<td>Nome Usuário</td>
                            <td>Data</td>
                            <td>Nome Estabelecimento</td>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>$id_anuncio[0] </td>
							<td>$tb_empresa[0] </td>
							<td>$data</td>
							<td>$tb_empresa[0]</td>
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
		                                         	<td>Id Anuncio</td>
		                                            <td>Nome Usuário</td>
						                            <td>Data</td>
                            						<td>Nome Estabelecimento</td>
		                                         </tr>
		                                     </thead>
		                                     
		                                  <tbody>
		                                         <tr>
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
		                                         </tr>
		                                         <tr>
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
		                                         </tr>
		                                     </tbody>
		                                  </table>";
	}
?>