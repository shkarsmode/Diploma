<?php 

	require_once 'connect.php';

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$mail = $_POST['mail'];
	$password = $_POST['password'];


	if($name != ''){
		$mysqli->query("INSERT INTO `Person` (`id`, `name`, `surname`, `mail`, `password`, `currency`) VALUES (NULL, '$name', '$surname', '$mail', '$password', ' грн.')");
		exit("<meta http-equiv='refresh' content='0; url= login.php'>");
 	} else exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");

?>