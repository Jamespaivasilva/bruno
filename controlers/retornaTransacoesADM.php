<?php
		include '../model/conexao.php';

		$tran = isset($_GET['tran']) ? $_GET['tran'] : NULL;

	

		if($tran === NULL){

			$select = "SELECT num_transacao, created_at, plano, valor, cod_autorizacao, bandeira, validade_plano, cod_empresa FROM transacoes";
			$query = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");
			$i=0;
			while($tb_transacao = mysqli_fetch_array($query)){

				$num_transacao[$i] = $tb_transacao['num_transacao'];
				$created_at[$i] = date('d/m/Y', strtotime($tb_transacao['created_at']));
				$plano[$i] = $tb_transacao['plano'];
				if($plano[$i] === "1"){
					$plano[$i] = "Basic";
				}elseif($plano[$i] === "2"){
					$plano[$i] = "Standart";
				}elseif ($plano[$i] === "3") {
					$plano[$i] = "Gold";
				}else{
					$plano[$i] = "#ERROR";
				}
				$valor[$i] = 'R$' . number_format($tb_transacao['valor'], 2);
				$cod_autorizacao[$i] = $tb_transacao['cod_autorizacao'];
				$bandeira[$i] = $tb_transacao['bandeira'];
				$validade_plano[$i] = date('d/m/Y', strtotime($tb_transacao['validade_plano']));
				$cod_empresa[$i] = $tb_transacao['cod_empresa'];			

				$i++;
			}
			
			$i = 0;
			while($i <  count($num_transacao, COUNT_RECURSIVE)){
				$select2 = "SELECT razao_social from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'; ";
				$query2 = mysqli_query($conexao, $select2) or die ("ERRO AO CONECTAR");

				$tb_empresa = mysqli_fetch_array($query2);
				$empresa[$i] = $tb_empresa['razao_social'];

				echo "		                                     
			                                  <tbody>
			                                         <tr>
			                                           <td>$created_at[$i]</td>
			                                           <td>$num_transacao[$i]</td>
			                                           <td>$empresa[$i]</td>
			                                           <td>$valor[$i]</td>
			                                           <td>$plano[$i]</td>
			                                           <td>$bandeira[$i]</td>
			                                           <td>$cod_autorizacao[$i]</td>
			                                           <td>$validade_plano[$i]</td>
			                                         </tr>		    
			                                     </tbody>";	                                
	                               
	            $i++;
			};  
		}else{
			$select = "SELECT  num_transacao, created_at, plano, valor, cod_autorizacao, bandeira, validade_plano, cod_empresa
					   FROM transacoes
					   WHERE num_transacao = '$tran'";
			$query = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");

			$i=0;
			while($tb_transacao = mysqli_fetch_array($query)){

				$num_transacao[$i] = $tb_transacao['num_transacao'];
				$created_at[$i] = date('d/m/Y', strtotime($tb_transacao['created_at']));
				$plano[$i] = $tb_transacao['plano'];
				if($plano[$i] === "1"){
					$plano[$i] = "Basic";
				}elseif($plano[$i] === "2"){
					$plano[$i] = "Standart";
				}elseif ($plano[$i] === "3") {
					$plano[$i] = "Gold";
				}else{
					$plano[$i] = "#ERROR";
				}
				$valor[$i] = 'R$' . number_format($tb_transacao['valor'], 2);
				$cod_autorizacao[$i] = $tb_transacao['cod_autorizacao'];
				$bandeira[$i] = $tb_transacao['bandeira'];
				$validade_plano[$i] = date('d/m/Y', strtotime($tb_transacao['validade_plano']));
				$cod_empresa[$i] = $tb_transacao['cod_empresa'];			

				$i++;
			}

			$i = 0;
			while($i <  count($num_transacao, COUNT_RECURSIVE)){
				$select2 = "SELECT razao_social from pessoa_juridica where cod_empresa = '$cod_empresa[$i]'; ";
				$query2 = mysqli_query($conexao, $select2) or die ("ERRO AO CONECTAR");

				$tb_empresa = mysqli_fetch_array($query2);
				$empresa[$i] = $tb_empresa['razao_social'];

				echo "		                                     
			                                  <tbody>
			                                         <tr>
			                                           <td>$created_at[$i]</td>
			                                           <td>$num_transacao[$i]</td>
			                                           <td>$empresa[$i]</td>
			                                           <td>$valor[$i]</td>
			                                           <td>$plano[$i]</td>
			                                           <td>$bandeira[$i]</td>
			                                           <td>$cod_autorizacao[$i]</td>
			                                           <td>$validade_plano[$i]</td>
			                                         </tr>		    
			                                     </tbody>";	                                
	                               
	            $i++;
			};  

			

		}                    
?> 		
