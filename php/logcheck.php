<?php
	
	$login = $_POST['log'];
	$password = $_POST['passw'];
	$id = $_POST['id'];

	if($login != ''){
		session_start();
		$_SESSION['login'] = $login;
 		$_SESSION['password'] = $password;
 		$_SESSION['id'] = $id ;

		exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");
		
	} else exit("<meta http-equiv='refresh' content='0; url= login.php'>");
	