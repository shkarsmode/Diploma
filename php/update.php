<?php 
	require_once 'main.php';
	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}
	
	$date = $_POST['date'];
	$type = $_POST['type'];
	$account = $_POST['account'];
	$profit = $_POST['profit'];
	$cost = $_POST['cost'];
	$temp = $_POST['temp'];

	echo $cost." ".$profit;
	if($cost == '')
	$mysqli->query("UPDATE `profit` SET `date` = '$date', `type` = '$type', `account` = '$account', `profit` = '$profit' WHERE `id` = '$temp'");
	else $mysqli->query("UPDATE `costs` SET `date` = '$date', `type` = '$type', `account` = '$account', `cost` = '$cost' WHERE `id` = '$temp'");

	// echo $date." ".$type." ".$account." ".$profit." ".$temp;
	
	
	exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");
	
?>