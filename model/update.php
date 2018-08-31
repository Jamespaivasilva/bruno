<?php
	function update ($tabela, $campo, $valor, $email) {
		return $result="UPDATE $tabela set $campo = '$valor' where email ='$email'";
	} 
?> 