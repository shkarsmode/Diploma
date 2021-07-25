<?php
	require_once "simple_html_dom.php";
	$html = file_get_html('https://finance.rambler.ru/calculators/converter/1-USD-UAH/');
	$usd = $html->find('div.converter-display__value');
	$us = $usd[1]->plaintext; 
	// $us = floatval($usd[1]);
	// $usd[1] = str_replace('.',',',$usd[1]);
	// echo $usd[1];

	$html = file_get_html('https://finance.rambler.ru/calculators/converter/1-UAH-RUB/');
	$rub = $html->find('div.converter-display__value');
	// echo $rub[1];
	$ru = $rub[1]->plaintext; 

?>