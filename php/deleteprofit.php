<?php 
	require_once 'main.php';

	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}

	$id = $_GET['id'];
	echo $id;

	$mysqli->query("DELETE FROM `Profit` WHERE `id` = '$id'");

	// header("Location: http://buh/index.php"); НЕ РАБОТАЕТ???
	exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");
?>