<?php
	include '../model/conexao.php';

	$query = isset($_GET['query']) ? $_GET['query'] : '';

	if($query != ''){
		$r_query = mysqli_query($conexao, $query) or die ("Erro ao conectar &raquo; " . mysql_error());
		$contador = $r_query->num_rows;

		$id = [];
		$nome = [];
		$email = [];
		$motivo = []; 
		$assunto = []; 
	    $i = 0;

	    while($tb_cliente = mysqli_fetch_array($r_query)) {
	    	$id[$i] = $tb_cliente['id'];
	        $nome[$i] = $tb_cliente['nome'];
	        $email[$i] = $tb_cliente['email'];
	        $motivo[$i] = $tb_cliente['motivo'];
	        $assunto[$i] = $tb_cliente['assunto'];	

	        $i++;
	    }	

		if($contador <> 0){
			echo 
				"<table class='table table-bordered'>
					<thead>
						<tr>
							<td>Id</td>
							<td>Nome</td>
							<td>Email</td>
							<td>Motivo do Contato</td>
							<td>Descrição do Assunto</td>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>$id[0] </td>
							<td>$nome[0] </td>
							<td>$email[0]</td>
							<td>$motivo[0]</td>
							<td>$assunto[0]</td>
						</tr>
					</tbody>
	          	</table>";
		}else{
			echo "Não localizado";
		}

	}else{
		$seleciona = "SELECT id,nome, email, motivo, assunto FROM contatos ORDER BY created_at limit 4";
		$query = mysqli_query($conexao, $seleciona) or die ("Erro ao conectar");

		$id = [];
		$nome = [];
		$email = [];
		$motivo = []; 
		$assunto = []; 
	    $i = 0;

	    while($tb_cliente = mysqli_fetch_array($query)) {
	    	$id[$i] = $tb_cliente['id'];
	        $nome[$i] = $tb_cliente['nome'];
	        $email[$i] = $tb_cliente['email'];
	        $motivo[$i] = $tb_cliente['motivo'];
	        $assunto[$i] = $tb_cliente['assunto'];	

	        $i++;
	    }	

		echo "<table class='table table-bordered'>
		                                     <thead>
		                                         <tr>
		                                         	<td>Id</td>
		                                         	<td>Nome</td>
													<td>Email</td>
													<td>Motivo do Contato</td>
													<td>Descrição do Assunto</td>
		                                         </tr>
		                                     </thead>		                                     
		                                  <tbody>
		                                         <tr>
		                                           <td>$id[0]</td>
		                                           <td>$nome[0]</td>
		                                           <td>$email[0]</td>
		                                           <td>$motivo[0]</td>
		                                           <td>$assunto[0]</td>		                                          
		                                         </tr>
		                                         <tr>
		                                           <td>$id[1]</td>
		                                           <td>$nome[1]</td>
		                                           <td>$email[1]</td>
		                                           <td>$motivo[1]</td>
		                                           <td>$assunto[1]</td>		                                       
		                                         </tr>
		                                         <tr>
		                                           <td>$id[2]</td>
		                                           <td>$nome[2]</td>
		                                           <td>$email[2]</td>
		                                           <td>$motivo[2]</td>
		                                           <td>$assunto[2]</td>			                                           
		                                         </tr>
		                                         <tr>
		                                           <td>$id[3]</td>
		                                           <td>$nome[3]</td>
		                                           <td>$email[3]</td>
		                                           <td>$motivo[3]</td>
		                                           <td>$assunto[3]</td>			                                           
		                                         </tr>
		                                     </tbody>
		                                  </table>";
	}
?>