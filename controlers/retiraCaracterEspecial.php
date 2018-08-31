<?php
	 function retiraCaracterEspecial($valor){
	 	include '../model/conexao.php';
		return mysqli_real_escape_string($conexao,$valor);
	} 
?>