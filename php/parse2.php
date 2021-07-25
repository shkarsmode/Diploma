<?php
			 require_once 'main.php';
			 require_once "parse.php";
			 $mon = 2;
			if($vars["currency"] == " RUB") $mon = 0;
			else if($vars["currency"] == " $") $mon = 1;
			else $mon = 2;
			
			if($mon == 0) $mon = round(floatval($ru), 2);
			else if($mon == 1) $mon = 1/ round(floatval($us), 2);
			else $mon = 1;


?>