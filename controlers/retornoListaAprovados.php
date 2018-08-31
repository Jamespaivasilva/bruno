 <?php
	    include "../model/conexao.php";

	    $id = $_GET['id'];

		$cliente = "SELECT nome, dt_reserva FROM pessoa_fisica 
	    			INNER JOIN reserva ON reserva.cod_usuario = pessoa_fisica.cod_usuario
	                INNER JOIN pessoa_juridica ON pessoa_juridica.cod_empresa = reserva.cod_empresa
	                WHERE pessoa_juridica.cod_empresa= '$id' AND STATUS ='1'";

	    $cliente = mysqli_query($conexao, $cliente) or die ("Erro ao conectar &raquo; " . mysql_error());

	    $nome = [];
		$dt_reserva = []; 
		$i = 0;
		while($tb_cliente = mysqli_fetch_array($cliente)) {
			$nome[$i] = $tb_cliente['nome'];
			$dt_reserva[$i] = date('d/m/Y', strtotime($tb_cliente['dt_reserva']));
			$i++;
			}

		$i = 0;
		while($i <  count($nome, COUNT_RECURSIVE)) {
			echo "
		        <td class='col-xs-3'>$nome[$i]</td>
		        <td class='col-xs-3'>$dt_reserva[$i]</td>
		    ";
		    $i++;
		}
?>