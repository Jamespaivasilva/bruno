<?php
		include '../model/conexao.php';

		$select = "SELECT num_transacao, created_at, plano, valor, cod_autorizacao, bandeira, validade_plano FROM transacoes where cod_empresa='$id'";
		$query = mysqli_query($conexao, $select) or die ("ERRO AO CONECTAR");

		$i =0;

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

			$i++;
		}
		$dados_empresa = dadosEmpresa(0);
		$i = 0;
		while($i <  count($num_transacao, COUNT_RECURSIVE)){
			echo "		                                     
		                                  <tbody>
		                                         <tr>
		                                           <td>$num_transacao[$i]</td>
		                                           <td>$dados_empresa</td>
		                                           <td>$created_at[$i]</td>
		                                           <td>$plano[$i]</td>
		                                           <td>$valor[$i]</td>
		                                           <td>$cod_autorizacao[$i]</td>
		                                           <td>$bandeira[$i]</td>
		                                           <td>$validade_plano[$i]</td>
		                                         </tr>		    
		                                     </tbody>";	                                
                               
            $i++;
		};                      
?> 		
