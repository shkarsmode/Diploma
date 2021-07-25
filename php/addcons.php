<?php 
	require_once "parse2.php";


	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}


	$money = $_POST['cardinput'];
	$cat = $_POST['catinput'];
	$date = $_POST['dateinput'];
	$profit = round($_POST['profit']*1/$mon);

	$date = strtotime($date);
	$date = date('Y-m-d', $date);

	$mysqli->query("INSERT INTO `Costs` (`id_person`, `id`, `cost`, `date`, `account`, `type`) VALUES ('$id', NULL, '$profit', '$date', '$money', '$cat')");

	// header("Location: http://buh/index.php"); НЕ РАБОТАЕТ???
	exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");
?>