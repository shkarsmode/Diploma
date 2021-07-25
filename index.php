<?php 
		require_once 'php/main.php';
		if(!isset($_SESSION['login'])){
			header('Location: php/login.php');
		}
		
		$arr = [
			'Січень',
			'Лютий',
			'Березень',
			'Квітень',
			'Травень',
			'Червень',
			'Липень',
			'Серпень',
			'Вересень',
			'Жовтень',
			'Листопад',
			'Грудень'
		 ];
		 $month = date('n')-1;

		 require_once "php/parse.php";
		 $mon = 2;
		if($vars["currency"] == " RUB") $mon = 0;
		else if($vars["currency"] == " $") $mon = 1;
		else $mon = 2;
		
		if($mon == 0) $mon = round(floatval($ru), 2);
		else if($mon == 1) $mon = 1/ round(floatval($us), 2);
		else $mon = 1;

		
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/favicon.ico">

	<link rel="stylesheet" href="css/style.css">
	<title>Finance.online</title>

	<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
	<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/calendar.css" />
	<script type="text/javascript" src="script/calendar.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script type="text/javascript" src="script/money.js"></script>
</head>

<body>


	<div id="dialog" class="dialog">
		<form onsubmit="subme(this); return false;">
			<div class="dialog-content">
				<div class="dialog-header">
					<div class="actype">
						<div class="flx-column" id="orange">
							<div class="eksi"><img src="img/orange.png" alt=""></div>
							<div class="ctype" id='cardinput2'>Обрати рахунок</div>
							<input type="hidden" id="cardinput" name="cardinput">
						</div>

						<div class="hr"></div>

						<div class="flx-column">
							<div class="eksi" id="green-red"><img src="img/green.png" alt="" id="green"></div>
							<div class="ctype" id="catinput2">Обрати категорію</div>
							<input type="hidden" id="catinput" name="catinput">
						</div>

						<div class="hr"></div>

						<div class="flx-column" onclick="xCal('datecheck'); changepos();">
							<div class="eksi" id="blue"><img src="img/blue.png" alt=""></div>
							<div class="ctype" id="datecheck">Вказати дату</div>
							<input type="hidden" id="dateinput" name="dateinput">
						</div>
					</div>
					<span class="close">&times;</span>
				</div>
				<div class="dialog-body">

					<div class="cntr"><input type="number" class="sum" placeholder="0" id="profit" name="profit"></div>
					<div class="cntr"><textarea type="text" class="sum txt" placeholder="Опис"></textarea></div>


				</div>
				<div class="dialog-footer">
					<input type="submit" class="sub" value="OK">
				</div>
			</div>
		</form>
	</div>

	<div id="dialog2" class="dialog">
		<div class="dialog-content">
			<div class="dialog-header">
				<div class="actype actype2">

					<div class="flx-column" id="card">
						<div class="eksi"><img src="img/card.png" alt="" id="green"></div>
						<div class="ctype">Карта</div>
					</div>


					<div class="flx-column" id="nmoney">
						<div class="eksi"><img src="img/money.png" alt=""></div>
						<div class="ctype">Готівкові гроші</div>
					</div>
				</div>
				<span class="close">&times;</span>
			</div>
		</div>
	</div>

	<div id="dialog3" class="dialog">
		<div class="dialog-content">
			<div class="dialog-header">
				<div class="actype actype2">

					<div class="flx-column" id="zp">
						<div class="eksi"><img src="img/zp.png" alt="" id="green"></div>
						<div class="ctype">Зарплата</div>
					</div>


					<div class="flx-column" id="stp">
						<div class="eksi"><img src="img/stp.png" alt=""></div>
						<div class="ctype">Стипендія</div>
					</div>

					<div class="flx-column" id="present">
						<div class="eksi"><img src="img/present.png" alt=""></div>
						<div class="ctype">Подарунок</div>
					</div>


					<div class="flx-column" id="others">
						<div class="eksi"><img src="img/others.png" alt=""></div>
						<div class="ctype">Інше</div>
					</div>
				</div>
				<span class="close">&times;</span>
			</div>
		</div>

	</div>

	<div id="dialog4" class="dialog">
		<div class="dialog-content">
			<div class="dialog-header">
				<div class="actype actype2">

					<div class="flx-column" id="kv">
						<div class="eksi"><img src="img/apartment.png" alt=""></div>
						<div class="ctype">Квартира та дім</div>
					</div>


					<div class="flx-column" id="goods">
						<div class="eksi"><img src="img/goods.png" alt=""></div>
						<div class="ctype">Товари</div>
					</div>

					<div class="flx-column" id="presentfor">
						<div class="eksi"><img src="img/presentfor.png" alt=""></div>
						<div class="ctype">Подарунок</div>
					</div>


					<div class="flx-column" id="others2">
						<div class="eksi"><img src="img/others2.png" alt=""></div>
						<div class="ctype">Інше</div>
					</div>
				</div>
				<span class="close">&times;</span>
			</div>
		</div>

	</div>

	<div class="layout">
		<div class="layout_container">
			<header class="header">
				<a href="#" class="logo">
					<img src="img/logo.svg" alt="">
				</a>
				<div class="empty"></div>

				<div class="wrap-menu">
					<div class="typeOfMoney">
						<span>
							<button id="but"><img src="img/ukraine.png" id="flag"><span id="fss">Змінити валюту</span>
								<input type="hidden" value="<?php echo  $vars[" currency"] ?>" id="inpmoney">
							</button>

							<div class="typeSelect">
								<form action="php/typemoney.php" id="typemoney1" method="post">
									<div class="money" onclick="submitform1();"><img src="img/ukraine.png"
											alt=""><span>Украинская</span>
										<font>₴</font>
										<input type="hidden" value=" грн." name="input">
									</div>
								</form>
								<form action="php/typemoney.php" id="typemoney2" method="post">
									<div class="money" onclick="submitform2();"><img src="img/Russia.png"
											alt=""><span>Российский</span>
										<font>₽</font>
										<input type="hidden" value=" RUB" name="input">
									</div>
								</form>
								<form action="php/typemoney.php" id="typemoney3" method="post">
									<div class="money" onclick="submitform3();"><img src="img/Uk.png"
											alt=""><span>Английский</span>
										<font>$</font>
										<input type="hidden" value=" $" name="input">
									</div><span>
							</div>
							</form>
						</span>
					</div>
					<div class="menu">
						<a href="php/transcosts.php" class="btn-icon">
							<img src="img/give.png" title="Витрати">
						</a>
						<a href="php/transincome.php" class="btn-icon">
							<img src="img/get.png" title="Доходи">
						</a>
						<a href="#rh" class="btn-icon">
							<img src="img/need.png" title="Рахунок">
						</a>
						<a href="php/calendar.php" class="btn-icon">
							<img src="img/aim.png" title="Календар">
						</a>
						<a href="php/logout.php" class="btn-icon">
							<img src="img/person.png" title="Вихід">
						</a>
					</div>
				</div>
			</header>

			<main class="main">
				<div class="avatar animate__animated animate__fadeInLeft">
					<img src="img/1.png" alt="">
					<div class="name">
						<?php echo $vars["name"].' '.$vars["surname"];?>
					</div>
					<div class="mail">
						<?php echo $vars["mail"];?>
					</div>
					<!-- <div class="mail" style="margin-top: 5px; font-weight: bold;">

						<table style="border-collapse: collapse">
							<caption>Курс</caption>
							<tr>
								<th>USD</th>
								<td><?php echo round(floatval($us), 2); ?></td>
								<td>UAH</td>
							</tr>
							<tr>
								<th>UAH</th>
								<td><?php echo round(floatval($ru), 2);?></td>
								<td>RUB</td>
							</tr>
						</table>

					</div> -->
				</div>

				<div class="main-hex animate__animated animate__fadeIn animate__slow">

					<div class="hex-wrap wrap1">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<div class="inner_text"><span>Транзакції</span>
							<font>-
								<?php echo round($vars_cost[0]["cost"]*$mon); ?> <span class="typeofm">
									<?php  echo $vars["currency"]; ?>
								</span>
							</font>
							<span class="time">
								<?php echo date("d M Y г.", strtotime($vars_cost[0]["date"]));?>
							</span>
						</div>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap2">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<div class="inner_text"><span>Календар</span>
							<font><?php
									echo $arr[$month];
									// $today = date('d M'); echo $today;
								?></font>
							<span class="time">Сьогодні</span>
						</div>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap3">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<abbr title="Готівкові гроші + Гроші на карті" data-toggle="tooltip" data-placement="bottom">
							<div class="inner_text center"><span>Бюджет</span>
								<font><?php
									$sum = 0;
									for($i = 0; $i < $profit; $i++)
										if($vars_profit[$i]['account'])
											$sum = $sum + $vars_profit[$i]['profit'];
									
									for($i = 0; $i < $cost; $i++)
										if($vars_cost[$i]['account'])
											$sum = $sum - $vars_cost[$i]['cost'];
									
									// for($i = 0; $i < $profit; $i++)
									// 	if($vars_profit[$i]['account'] == "Карта")
									// 		$sum = $sum + $vars_profit[$i]['profit'];
										
									// for($i = 0; $i < $cost; $i++)
									// 	if($vars_cost[$i]['account'] == "Карта")
									// 		$sum = $sum - $vars_cost[$i]['cost'];
									
									echo round($sum*$mon);
									// echo round($sum/28, 2);
								
								?> <span class="typeofm">
										<?php  echo $vars["currency"]; ?>
									</span></font>
								<span class="time">
									<?php echo date('d'); echo " ".$arr[$month]." "; echo date('Y г.'); ?>
								</span>
							</div>
						</abbr>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap4">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<div class="inner_text"><span>Витрати</span>
							<font>-
								<?php 
								$sum = 0;
								$today = date('Y-m-d');
								for($i = 0; $i < $cost; $i++){
									if($vars_cost[$i]["date"] == $today)
										$sum = $sum + $vars_cost[$i]["cost"];
									
								}
								echo round($sum*$mon).' ';
								$today = date('d M Y г.');
							
							?><span class="typeofm">
									<?php  echo $vars["currency"]; ?>
								</span>
							</font>
							<span class="time">
								<?php echo $today;?>
							</span>
						</div>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap5">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<div class="inner_text"><span>Доходи</span>
							<font>
								<?php 
								$sum = 0;
								$tdy = date('Y-m-d');
								for($i = 0; $i < $profit; $i++){
									if($vars_profit[$i]["date"] == $tdy)
										$sum = $sum + $vars_profit[$i]["profit"];
								}
								echo round($sum*$mon).' ';
								$today = date('d M Y г.');
							
							?> <span class="typeofm">
									<?php  echo $vars["currency"]; ?>
								</span>
							</font>
							<span class="time">
								<?php echo $today; ?>
							</span>
						</div>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap6">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<abbr title="Beta v0.2">
							<div class="inner_text"><span>Версія сайту</span>
								<font>Beta 0.2</font>
								<span class="time">від <?php $ty = date("d.m.Y");echo $ty; ?></span>
							</div>
						</abbr>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>


					<div class="hex-wrap wrap7">
						<div class="hex hex-1 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
						<div class="inner_text" style="color: rgba(0, 0, 0, 0.678);"><span
								style="font-weight: bold">Курс</span>
							<font>
								<table style="border-collapse: collapse; font-size:23px;">

									<tr>
										<th style="font-size:18px; color: black; opacity: 0.6">$</th>
										<td><?php echo round(floatval($us), 2); ?></td>
										<td style="font-size:18px; color: black; opacity: 0.5">₴</td>
									</tr>
									<tr>
										<th style="font-size:18px; color: black; opacity: 0.5">₴</th>
										<td><?php echo round(floatval($ru), 2);?></td>
										<td style="font-size:18px; color: black; opacity: 0.6">₽</td>
									</tr>
								</table>
							</font>
							<span class="time">8 апр. 2021 г.</span>
						</div>
						<div class="hex hex-1 hex-2 hex-gap">
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap8">
						<div class="hex hex-1 hex-gap">
							<div class="inner">+</div>
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

					<div class="hex-wrap wrap9">
						<div class="hex hex-1 hex-gap">
							<div class="inner">-</div>
							<div class="corner-1"></div>
							<div class="corner-2"></div>
						</div>
					</div>

				</div>

				<div class="alansyst">
					<div class="ct-chart ct-perfect-fourth" style="height: 100%;"></div>
					<div class="legend">
						<div class="leg-green" onclick="greenclick(this);">Доходи</div>
						<div class="leg-red" onclick="redclick(this);">Витрати</div>
					</div>
				</div>
				<div class="main-flex">
					<div class="account anim4" id="rh">
						<div class="account_title">
							Рахунок
						</div>
						<div class="account_name">
							<span>Готівкові гроші</span>
							<div class="pl-minus">
								<span class="money">
									<?php 
									$sum = 0;
									for($i = 0; $i < $profit; $i++)
										if($vars_profit[$i]['account'] == "Готівкові гроші")
											$sum = $sum + $vars_profit[$i]['profit'];
									
									for($i = 0; $i < $cost; $i++)
										if($vars_cost[$i]['account'] == "Готівкові гроші")
											$sum = $sum - $vars_cost[$i]['cost'];

										echo round($sum*$mon).' '.$vars["currency"];
								?>

								</span>
								<span class="pl" id="plus">+</span>
								<span class="minus" id="minus">-</span>
							</div>
						</div>
						<div class="account_name">
							<span>Карта</span>
							<div class="pl-minus">
								<span class="money">
									<?php 
									$sum = 0;
									for($i = 0; $i < $profit; $i++)
										if($vars_profit[$i]['account'] == "Карта")
											$sum = $sum + $vars_profit[$i]['profit'];
									
									for($i = 0; $i < $cost; $i++)
										if($vars_cost[$i]['account'] == "Карта")
											$sum = $sum - $vars_cost[$i]['cost'];

											echo round($sum*$mon).' '.$vars["currency"];
								?>
								</span>
								<span class="pl" id="plusc">+</span>
								<span class="minus" id="minusc">-</span>
							</div>
						</div>

					</div>

					<div class="transactions anim42">
						<div class="account_title">
							Транзакції за
							<?php $tdy = date("d.m.Y");echo $tdy; ?>
						</div>
						<?php 
							$tdy = date('Y-m-d');
							$temp = 0;
							for($i = 0; $i < $profit; $i++){
								if($vars_profit[$i]["date"] == $tdy){
								echo '
									<div class="account_name">
									<span class="green green2">'.$vars_profit[$i]["type"].'</span>
									<div class="pl-minus">
										<span class="money"><font id="nal-card">'.$vars_profit[$i]['account'].'</font><span class="green">+ '.round($vars_profit[$i]['profit']*$mon).' '.$vars['currency'].'</span></span>
										<a href="php/updateprofit.php?id='.$vars_profit[$i]['id'].'"><span class="pl">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
												xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="386.375px"
												height="386.375px" viewBox="0 0 386.375 386.375"
												style="enable-background:new 0 0 386.375 386.375;" xml:space="preserve">
												<g>
													<path d="M21.05,286.875l76.5,76.5l-1.9,3.8l-95.6,19.2l19.1-95.6L21.05,286.875z M34.65,272.775l77.1,77.1l216.4-216.399
											l-77.101-77.1L34.65,272.775z M374.85,34.375l-23-22.9c-15.3-15.3-38.199-15.3-53.5,0l-32.5,32.5l76.5,76.5l32.5-32.5
											C390.15,72.675,390.15,47.775,374.85,34.375z" />
												</g>
											</svg></span></a>
											<span class="minus musor">
											<input type=hidden value="profit.php?id='.$vars_profit[$i]['id'].'">
											<svg xmlns="http://www.w3.org/2000/svg" width="10px" viewBox="0 0 12 16">
												<path fill-rule="evenodd"
													d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z" />
											</svg></span>
									</div>
								</div>';
								$temp++;
							}
									
							}

						for($i = 0; $i < $cost; $i++){
							if($vars_cost[$i]["date"] == $tdy){
							echo '
						<div class="account_name">
						<span class="red red2">'.$vars_cost[$i]['type'].'</span>
						<div class="pl-minus">
							<span class="money"><font id="nal-card">'.$vars_cost[$i]['account'].'</font><span class="red">- '.round($vars_cost[$i]['cost']*$mon).' '.$vars['currency'].'</span></span>
							<a href="php/updatecosts.php?id='.$vars_cost[$i]['id'].'"><span class="pl">
								<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="386.375px"
									height="386.375px" viewBox="0 0 386.375 386.375"
									style="enable-background:new 0 0 386.375 386.375;" xml:space="preserve">
									<g>
										<path d="M21.05,286.875l76.5,76.5l-1.9,3.8l-95.6,19.2l19.1-95.6L21.05,286.875z M34.65,272.775l77.1,77.1l216.4-216.399
								l-77.101-77.1L34.65,272.775z M374.85,34.375l-23-22.9c-15.3-15.3-38.199-15.3-53.5,0l-32.5,32.5l76.5,76.5l32.5-32.5
								C390.15,72.675,390.15,47.775,374.85,34.375z" />
									</g>
								</svg></span></a>
							<span class="minus musor">
								<input type=hidden value="costs.php?id='.$vars_cost[$i]['id'].'">
								<svg xmlns="http://www.w3.org/2000/svg" width="10px" viewBox="0 0 12 16">
									<path fill-rule="evenodd"
										d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z" />
								</svg></span>
						</div>
						</div>
						';
								$temp++;
							}
							
						}

						if($temp == 0) 
							echo '
							<div class="account_name">
							<span class="text">Немає транзакцій</span>
							
							</div>
							';

						?>


					</div>
				</div>

			</main>
		</div>


	</div>

	<script type="text/javascript" src="script/value.js"></script>


	<script>
	let musor = document.querySelectorAll('.musor');
	for (let i = 0; i < musor.length; i++) {
		musor[i].addEventListener('click', () => {
			let res = confirm("Бажаєте видалити транзакцію?");
			if (res) document.location.href = "php/delete" + musor[i].querySelector('input').value;


		});
	}
	</script>

	<script>
	let typfm = "<?php  echo $vars["currency"]; ?>";
	let flgg = document.querySelector('#flag');
	switch (typfm) {
		case ' грн.':
			flgg.src = 'img/ukraine.png';
			break;
		case ' RUB':
			flgg.src = 'img/Russia.png';
			break;
		case ' $':
			flgg.src = 'img/Uk.png';
			break;
	}


	function subme(el) {
		if (green.src == 'http://buh/img/green.png' || green.src == 'http://buh/img/zp.png' || green.src ==
			'http://buh/img/stp.png' || green.src == 'http://buh/img/present.png' || green.src == 'http://buh/img/others.png'
		) {

			console.log('green');
			el.action = 'php/addincome.php';
		} else {
			console.log('red');
			el.action = 'php/addcons.php';
		}


		el.method = 'post';
		let cardinput2 = document.querySelector('#cardinput2');
		let cardinput = document.querySelector('#cardinput');
		let catinput = document.querySelector('#catinput');
		let catinput2 = document.querySelector('#catinput2');
		let dateinput = document.querySelector('#dateinput');
		let dateinput2 = document.querySelector('#datecheck');
		let profit = document.querySelector('#profit');

		if (cardinput2.innerText != "Обрати рахунок")
			cardinput.value = cardinput2.innerText;

		if (catinput2.innerText != "Обрати категорію")
			catinput.value = catinput2.innerText;

		if (dateinput2.innerText != "Вказати дату")
			dateinput.value = dateinput2.innerText;

		if (cardinput.value != '' && catinput.value != '' && dateinput.value != '' && profit.value > 0)
			el.submit();

		if (cardinput.value == '')
			alert('Оберіть рахунок!');
		else if (catinput.value == '')
			alert('Оберіть категорію!');
		else if (dateinput.value == '')
			alert('Вкажіть дату!');
		else if (profit.value <= 0)
			alert('Вкажіть суму!');

		// console.log(profit.value);


	}

	function changepos() {
		let clrd = document.querySelector('#xcalend');
		if (window.innerWidth < 740)
			clrd.style.cssText = "position: absolute; top: 200px; right: 20%;";
	}
	</script>

	<script>
	let sich = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 1 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let lut = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 2 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let ber = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 3 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let kvi = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 4 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let tra = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 5 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let cher = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 6 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let lip = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 7 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let ser = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 8 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let ver = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 9 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let jov = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 10 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let lis = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 11 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let gru = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $cost; $i++) {
			$time = strtotime($vars_cost[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 12 == $month) {
				$sum = $sum + $vars_cost[$i]['cost'];
			}
		}
		echo round($sum*$mon);
		?> ";

	let sich2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 1 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let lut2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 2 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let ber2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 3 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let kvi2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 4 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let tra2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 5 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let cher2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 6 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let lip2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 7 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let ser2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 8 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo $sum;
		?> ";
	let ver2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 9 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let jov2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 10 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let lis2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 11 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";
	let gru2 = "<?php 
		$tdy = date('Y');
		$sum = 0;
		for ($i = 0; $i < $profit; $i++) {
			$time = strtotime($vars_profit[$i]["date"]);
			$year = date('Y', $time);
			$month = date('m', $time);
			if ($tdy == $year && 12 == $month) {
				$sum = $sum + $vars_profit[$i]['profit'];
			}
		}
		echo round($sum*$mon);
		?> ";

	let red = [sich, lut, ber, kvi, tra, cher, lip, ser, ver, jov, lis, gru];
	let greens = [sich2, lut2, ber2, kvi2, tra2, cher2, lip2, ser2, ver2, jov2, lis2, gru2];

	function redclick(el) {
		el.classList.toggle('leg-red2');

		let line = document.querySelectorAll('.ct-series-b line');
		for (let i = 0; i < line.length; i++) {
			if (el.classList.contains('leg-red2'))
				line[i].style.cssText = 'stroke: transparent';
			else line[i].style.cssText = 'stroke: #e45c70';
		}
	}

	function greenclick(el) {
		el.classList.toggle('leg-green2');
		// console.log(el.classList.contains('leg-green2'));
		let line = document.querySelectorAll('.ct-series-a line');
		for (let i = 0; i < line.length; i++) {
			if (el.classList.contains('leg-green2'))
				line[i].style.cssText = 'stroke: transparent';
			else line[i].style.cssText = 'stroke: #36ca80';
		}
	}

	var data = {
		labels: ['Січ', 'Лют', 'Бер', 'Кві', 'Тра', 'Чер', 'Лип', 'Сер', 'Вер', 'Жов', 'Лис', 'Гру'],
		series: [
			[greens[0], greens[1], greens[2], greens[3], greens[4], greens[5], greens[6], greens[7], greens[8], greens[
				9], greens[10], greens[11]],
			[red[0], red[1], red[2], red[3], red[4], red[5], red[6], red[7], red[8], red[9], red[10], red[11]]

		]
	};
	var options = {
		seriesBarDistance: 15
	};

	var responsiveOptions = [
		['screen and (min-width: 641px) and (max-width: 1024px)', {
			seriesBarDistance: 10,
			axisX: {
				labelInterpolationFnc: function(value) {
					return value;
				}
			}
		}],
		['screen and (max-width: 640px)', {
			seriesBarDistance: 5,
			axisX: {
				labelInterpolationFnc: function(value) {
					return value[0];
				}
			}
		}]
	];

	new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
	</script>

	<script>
	let dialog = document.getElementById('dialog');
	let dialog2 = document.getElementById('dialog2');
	let dialog3 = document.getElementById('dialog3');
	let inner = document.querySelectorAll('.inner');
	let close = document.querySelectorAll('.close');
	let green = document.querySelector('#green');
	let money = document.querySelector('#nmoney');
	let card = document.querySelector('#card');


	for (let i = 0; i < inner.length; i++) {
		inner[i].addEventListener('click', function() {
			switch (inner[i].innerText) {
				case '+':
					dialog.style.display = 'block';
					green.src = 'img/green.png';
					break;
				case '-':
					dialog.style.display = 'block';
					green.src = 'img/red.png';
					break;
			}
		});
	}

	close[0].onclick = function() {
		dialog.style.display = 'none';
	}

	close[1].onclick = function() {
		dialog2.style.display = 'none';
	}

	close[2].onclick = function() {
		dialog3.style.display = 'none';
	}

	close[3].onclick = function() {
		dialog4.style.display = 'none';
	}

	window.onclick = function(e) {
		if (e.target == dialog) {
			dialog.style.display = 'none';
		}
	}


	let orange = document.querySelector('#orange');
	let greenred = document.querySelector('#green-red');
	let blue = document.querySelector('#blue');

	card.onclick = function() {
		orange.querySelector('img').src = 'img/card.png';
		dialog2.style.display = 'none';
		orange.querySelector('.ctype').innerText = 'Карта';

	}

	money.onclick = function() {
		orange.querySelector('img').src = 'img/money.png';
		dialog2.style.display = 'none';
		orange.querySelector('.ctype').innerText = 'Готівкові гроші';
	}

	orange.onclick = function() {
		dialog2.style.display = 'block';
	}

	window.onclick = function(e) {
		if (e.target == dialog2) {
			dialog2.style.display = 'none';
		}
	}

	window.onclick = function(e) {
		if (e.target == dialog3) {
			dialog3.style.display = 'none';
		}
	}

	let flxclm = document.querySelectorAll('.flx-column');
	let txtclm = document.querySelectorAll('.ctype');
	for (let i = 0; i < flxclm.length; i++) {
		flxclm[i].onmouseover = function() {
			txtclm[i].style.color = "#5ccc94";
		}

		flxclm[i].onmouseleave = function() {
			txtclm[i].style.color = "#797979";
		}
	}

	green.onclick = function() {
		if (green.src == 'http://buh/img/green.png' || green.src == 'http://buh/img/zp.png' || green.src ==
			'http://buh/img/stp.png' || green.src == 'http://buh/img/present.png' || green.src ==
			'http://buh/img/others.png') {
			dialog3.style.display = 'block';
		} else {
			dialog4.style.display = 'block';
		}
	}

	let plus = document.querySelector('#plus');
	let minus = document.querySelector('#minus');
	let plusc = document.querySelector('#plusc');
	let minusc = document.querySelector('#minusc');

	plus.onclick = function() {
		dialog.style.display = 'block';
		green.src = 'img/green.png';
		orange.querySelector('img').src = 'img/money.png';
		orange.querySelector('.ctype').innerText = 'Готівкові гроші';

	}

	minus.onclick = function() {
		dialog.style.display = 'block';
		green.src = 'img/red.png';
		orange.querySelector('img').src = 'img/money.png';
		orange.querySelector('.ctype').innerText = 'Готівкові гроші';
	}

	plusc.onclick = function() {
		dialog.style.display = 'block';
		green.src = 'img/green.png';

		orange.querySelector('img').src = 'img/card.png';
		orange.querySelector('.ctype').innerText = 'Карта';
	}

	minusc.onclick = function() {
		dialog.style.display = 'block';
		green.src = 'img/red.png';
		orange.querySelector('img').src = 'img/card.png';
		orange.querySelector('.ctype').innerText = 'Карта';
	}

	let zp = document.querySelector('#zp');
	let stp = document.querySelector('#stp');
	let present = document.querySelector('#present');
	let others = document.querySelector('#others');

	zp.onclick = function() {
		green.src = 'img/zp.png';
		dialog3.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Зарплата';
	}

	present.onclick = function() {
		green.src = 'img/present.png';
		dialog3.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Подарунок';
	}

	stp.onclick = function() {
		green.src = 'img/stp.png';
		dialog3.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Стипендія';
	}

	others.onclick = function() {
		green.src = 'img/others.png';
		dialog3.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Інше';
	}

	let kv = document.querySelector('#kv');
	let goods = document.querySelector('#goods');
	let presentfor = document.querySelector('#presentfor');
	let others2 = document.querySelector('#others2');

	kv.onclick = function() {
		green.src = 'img/apartment.png';
		dialog4.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Квартира та дім';
	}

	goods.onclick = function() {
		green.src = 'img/goods.png';
		dialog4.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Товари';
	}

	presentfor.onclick = function() {
		green.src = 'img/presentfor.png';
		dialog4.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Подарунок';
	}

	others2.onclick = function() {
		green.src = 'img/others2.png';
		dialog4.style.display = 'none';
		green.closest('.flx-column').querySelector('.ctype').innerText = 'Інше';
	}
	</script>

	<script src="script/skroll.js"></script>
	<script>
	var skroll = new Skroll()

		.add(".anim1", {
			animation: "fadeInUp",
			delay: 120,
			duration: 1400,
			wait: 250
		})
		.add(".anim2", {
			animation: "flipInX",
			delay: 120,
			duration: 750
		})
		.add(".anim3", {
			animation: "rotateLeftIn",
			delay: 100,
			duration: 1350
		})
		.add(".anim4", {
			animation: "slideInLeft",
			delay: 80,
			duration: 800
		})
		.add(".anim42", {
			animation: "slideInRight",
			delay: 80,
			duration: 800
		})
		.add(".anim5", {
			animation: "growInLeft",
			delay: 80,
			duration: 1600,
			easing: "cubic-bezier(0.37, 0.27, 0.24, 1.26)"
		})
		.add(".anim6", {
			animation: "growInRight",
			delay: 80,
			duration: 1000,
			easing: "cubic-bezier(0.37, 0.27, 0.24, 1.26)",
		})
		.addAnimation("spinIn", {
			start: function(el) {
				el.style["transform"] = "rotate(-360deg) scale(.2,.2)";
				el.style["transform-origin"] = "50% 50%";
				el.style["opacity"] = 0;
			},
			end: function(el) {
				el.style["transform"] = "rotate(0deg) scale(1,1)";
				el.style["opacity"] = 1;
			}
		})
		.add(".anim7", {
			animation: "spinIn",
			delay: 80,
			duration: 1600,
			easing: "cubic-bezier(0.37, 0.27, 0.24, 1.26)"
		})
		.add(".anim8", {
			animation: "fadeInDown",
			delay: 75,
			duration: 150,
			triggerBottom: 1,
			easing: "cubic-bezier(0.37, 0.27, 0.24, 1.26)"
		})
		.init();
	</script>

</body>

</html>