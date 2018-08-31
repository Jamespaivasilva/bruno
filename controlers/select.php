<?php
	function select ($campo1, $tabela, $campo2, $valor, $condicaoextra) {
			if ($campo2 === "" and $valor === "" and $condicaoextra === "") {
				$select = "SELECT $campo1 FROM $tabela"; 
			}else{
				$select = "SELECT $campo1 FROM $tabela WHERE $campo2 = '$valor' $condicaoextra";
			}
		
		 return $select;
	} 
?> 