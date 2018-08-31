<?php
		include "../model/conexao.php";
		include '../controlers/validaPost.php';

		$id = $_GET['id'];
		$iduser = $_GET['iduser'];		

		if(isset($_POST['alterar'])){

			$nome = validaPost('nome');	
			$dt_reserva = validaPost('data');
			$hr_reserva = validaPost('horario');
			$qtdePessoas = validaPost('qtdePessoas');	

			$update = "UPDATE reserva
					SET dt_reserva ='$dt_reserva', hr_reserva='$hr_reserva', qtd_pessoa='$qtdePessoas'
					WHERE id_reserva ='$iduser'";

					echo $update;

			$sql = mysqli_query($conexao, $update);
		  	header('Location: ../view/perfil-admin-reservas.php?id=9');
		}
?> 		
