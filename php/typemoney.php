<?php 
	require_once 'main.php';

	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}

	$el = $_POST['input'];
	$mysqli->query("UPDATE `Person` SET `currency` = '$el' WHERE `id` = '$id'");

	header("Location: ../index.php");
	
?>
