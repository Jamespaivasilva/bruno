<?php	

	include "../controlers/validaPost.php";
	
	if(!isset($_SESSION))
		session_start();

	 $_SESSION['especialidade'] = validaPost('Coreana');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Japonesa');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Arabe');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Brasileira');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Hamburgueria');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Portugesa');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Tailandesa');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Tailandesa');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Francesa');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Holandesa');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Italiana');
	 $_SESSION['especialidade'] = $_SESSION['especialidade'] . " " . validaPost('Alema');

	 $_SESSION['dolar'] = validaPost('dolar1');
	 $_SESSION['dolar'] = $_SESSION['dolar'] ." ". validaPost('dolar2');
	 $_SESSION['dolar'] = $_SESSION['dolar'] ." ". validaPost('dolar3');
	 $_SESSION['dolar'] = $_SESSION['dolar'] ." ". validaPost('dolar4');

	 $_SESSION['estado'] = validaPost('estado');

	 header('Location: ../../../index.php');
?>