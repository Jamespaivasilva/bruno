<?php
	function validaPost ($variavel) {
		return isset($_POST[$variavel]) ? $_POST[$variavel] : '';
	} 
?> 