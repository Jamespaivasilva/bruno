<?php
	if(!isset($_SESSION))
		session_start();

	$id = $_GET['id'];
	$email = $_SESSION['email'];

	if(!isset($email)){
		header('Location: ../view/login-reserva.php'.'? id='.$id);
	}else{
		header('Location: ../view/reserva.php'.'?id='.$id);
	}
?> 