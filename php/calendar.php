<?php
	// require_once 'main.php';
	require_once "parse2.php";
	if(!isset($_SESSION['login'])){
		header('Location: login.php');
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
	 
	 if(isset($_GET[id])) $monthId = $_GET[id]; 
	 else $monthId = 0;
	 $monthId = '-'.$monthId.' Month';
	 $month = date('n', strtotime($monthId))-1;


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/trans.css">
	<link rel="stylesheet" href="../css/cal.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


	<title>Транзакції</title>
</head>

<body>
	<div id="dialog" class="dialog">
		<form onsubmit="subme(this); return false;">
			<div class="dialog-content">
				<div class="dialog-header">
					<div class="actype">
						<span class="tm"></span>
						<div class="tbl">
							<div class="tblBottom">
								<div class="dfx">
									<span class="th">Тип</span>
									<span>Бюджет</span>
								</div>
								<div class="dfx">
									<span class="th">Прибуток</span>
									<span class="prr">
										<span class="modalVar">3243</span><span class="typeofm">
											<?php  echo $vars["currency"]; ?>
										</span>
									</span>
								</div>
								<div class="dfx">
									<span class="th">Витрати</span>
									<span class="coss">
										<span class="modalVar">3243</span><span class="typeofm">
											<?php  echo $vars["currency"]; ?>
										</span>
									</span>
								</div>
								<div class="dfx">
									<span class="th">Різниця</span>
									<span class="">
										<span class="modalVar">3243</span><span class="typeofm">
											<?php  echo $vars["currency"]; ?>
										</span>
									</span>
								</div>

							</div>
						</div>

					</div>
					<span class="close">&times;</span>
				</div>
				<div class="dialog-footer">
					<input type="button" class="sub" value="OK">
				</div>
			</div>
		</form>
	</div>
	<div class="layout">
		<div class="layout_container">
			<header class="header">
				<a href="../index.php" class="logo">
					<img src="../img/logo.svg" alt="">
				</a>
				<div class="empty"></div>
				<div class="wrap-menu">
					<div class="menu">
						<a href="transcosts.php" class="btn-icon">
							<img src="../img/give.png" alt="Витрати">
						</a>
						<a href="transincome.php" class="btn-icon">
							<img src="../img/get.png" alt="Доходи">
						</a>
						<a href="../index.php" class="btn-icon">
							<img src="../img/need.png" alt="Рахунок">
						</a>
						<a href="calendar.php" class="btn-icon">
							<img src="../img/aim.png" alt="Календар">
							<a href="logout.php" class="btn-icon">
								<img src="../img/person.png" alt="Вихід">
							</a>
					</div>
				</div>
			</header>
			<div class="main">
				<div class="header-main ">
					<div>
						<div class="dlf">
							<div>
								<a href="../index.php">
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" widtd="346px" height="346px"
										viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
										<g>
											<g id="chevron-left">
												<polygon
													points="247.35,35.7 211.65,0 58.65,153 211.65,306 247.35,270.3 130.05,153 		" />
											</g>
									</svg>
								</a>

								<h3>Календар за <?php echo $arr[$month].' '.date('Y', strtotime($monthId)); ?></h3>
							</div>
							<div>
								<div onclick="minusMonth();">
									<svg version=" 1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
										xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" widtd="346px" height="346px"
										viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
										<g>
											<g id="chevron-left">
												<polygon
													points="247.35,35.7 211.65,0 58.65,153 211.65,306 247.35,270.3 130.05,153 		" />
											</g>
									</svg>
								</div>
								<font onclick="startMonth();"><?php echo $arr[$month]; ?></font>
								<div onclick=" plusMonth();">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										version="1.1" id="Capa_1" x="0px" y="0px" width="306px" height="306px"
										viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
										<g>
											<g id="keyboard-arrow-right">
												<polygon
													points="58.65,267.75 175.95,153 58.65,35.7 94.35,0 247.35,153 94.35,306   " />
											</g>
										</g>
									</svg>
								</div>

							</div>
						</div>

					</div>
				</div>
				<div class="cal">
					<table>
						<tr class="anim42">
							<th>пн</th>
							<th>вт</th>
							<th>ср</th>
							<th>чт</th>
							<th>пт</th>
							<th>сб</th>
							<th>нд</th>
						</tr>

						<?php
							// $check = date('Y-04-03');
							// echo $check;
							
							// $dtt = date('Y-m-d');
							// echo $dtt." ";
							// echo date('Y-m-d', strtotime($helpp));

							$profitDate = array();
							for($i = 0; $i < $profit; $i++){
								if(date('m Y', strtotime($vars_profit[$i]["date"])) == date('m Y', strtotime($monthId))){
									for($m = 1; $m < 31; $m++)
										if(date('d', strtotime($vars_profit[$i]["date"])) == $m){
											$profitDate[$m] = $profitDate[$m] + $vars_profit[$i]["profit"];
										}							
								}	
							}

							// print_r($profitDate);

							$costsDate = array();
							for($i = 0; $i < $cost; $i++){
								if(date('m Y', strtotime($vars_cost[$i]["date"])) == date('m Y', strtotime($monthId))){
									for($m = 1; $m < 31; $m++)
										if(date('d', strtotime($vars_cost[$i]["date"])) == $m){
											$costsDate[$m] = $costsDate[$m] + $vars_cost[$i]["cost"];
										}							
								}	
							}
							
							// print_r($costsDate);

						  $last = date('Y-m-t', strtotime($monthId));
						  $lastDay = date('d', strtotime($last));
						  $today = date('Y-m-01', strtotime($monthId));
						  $td =  date('d');

						  function getWeekday($date) {
								return date('w', strtotime($date));
					 	 	}

						  switch(getWeekday($last)){
								case '6': $last = 5; break;
								case '0': $last = 6; break;
								case '1': $last = 0; break;
								case '2': $last = 1; break;
								case '3': $last = 2; break;
								case '4': $last = 3; break;
								case '5': $last = 4; break;
							}
					
							
							$count = null;
							switch(getWeekday($today)){
								case '6': $count = 5; break;
								case '0': $count = 6; break;
								case '1': $count = 0; break;
								case '2': $count = 1; break;
								case '3': $count = 2; break;
								case '4': $count = 3; break;
								case '5': $count = 4; break;
							}
							$day = 1;
							echo '<tr>';
							$week;
							$tood;
							for($i = 0; $i< 7;$i++){
								if($day == $td && $monthId === 0) $tood = 'today';
								else $tood = '';
								if($i == 6) $week = 'active week';
								else $week = 'active';
								if($i >= $count){
									$p;
										$c;
										
										if($profitDate[$day] != '') $p = $profitDate[$day];
										else $p = '';
										if($costsDate[$day] != '') $c = $costsDate[$day];
										else $c = '';
										if($day < 10) $day = '0'.$day;
									echo '<td class="'.$week.' anim2" id="'.$tood.'">
									<div class="top">
									<input type="hidden" value="'.$day.'.'.date('m').'" class="dwy">
									<input type="hidden" value="'.$p.'" class="pro">
									<span class=""></span>
									<input type="hidden" value="'.$c.'" class="cos">
									<span class=""></span>
									</div>
								<div class="bottom">
									'.$day.'
									</div>
								</td>';
								$day++;
								}
								else echo '<td></td>';
								
							}
							echo '</tr>';
							
							for($y = 1; ; $y++){
								echo '<tr>';
								$i = 0;
								$week;
								$tood;
								for(; $i < 7; $i++){
									
									if($day == $td && $monthId == 0) $tood = 'today';
									else $tood = '';

									if($i == 6) $week = 'active week';
									else $week = 'active';

									if($lastDay < $day) echo '<td></td>';
									else {
										$p;
										$c;
										if($profitDate[$day] != '') $p = $profitDate[$day];
										else $p = '';
										if($costsDate[$day] != '') $c = $costsDate[$day];
										else $c = '';
										if($day < 10) $day = '0'.$day;
										echo '<td class="'.$week.' anim2" id="'.$tood.'">
											<div class="top">
												<input type="hidden" value="'.$day.'.'.date('m').'" class="dwy">
												<input type="hidden" value="'.$p.'" class="pro">
												<span class=""></span>
												<input type="hidden" value="'.$c.'" class="cos">
												<span class=""></span>
											</div>
										<div class="bottom">
											'.$day.'
											</div>
										</td>' ;
									}

									if($lastDay < $day && $i == 6) break;
									$day++;
								}
								echo '</tr>';
								if($lastDay < $day && $i == 6) break;
							}

							
						?>

					</table>
				</div>

			</div>
		</div>
	</div>

	<script>
	function plusMonth() {
		// el.preventDefault();
		let id = "<?php 
		if(isset($_GET[id])) echo $monthId = $_GET[id]; 
		else echo $monthId = 0;
		?>";
		let temp = parseInt(id) - 1;
		console.log(temp);
		if (temp >= 0) document.location.href = "?id=" + temp;
	}

	function minusMonth() {
		// el.preventDefault();
		let id = "<?php 
		if(isset($_GET[id])) echo $monthId = $_GET[id]; 
		else echo $monthId = 0;
		// unset($_GET['id']);
		?>";
		let temp = parseInt(id) + 1;
		document.location.href = "calendar.php?id=" + temp;
	}

	function startMonth() {
		document.location.href = "calendar.php?id=0";
	}
	</script>

	<script>
	let pro = document.querySelectorAll('.pro');
	for (let i = 0; i < pro.length; i++) {
		if (pro[i].value != '')
			pro[i].nextSibling.nextSibling.classList.add('greenPro');
	}

	let cos = document.querySelectorAll('.cos');
	for (let i = 0; i < cos.length; i++) {
		if (cos[i].value != '')
			cos[i].nextSibling.nextSibling.classList.add('redCos');
	}

	let active = document.querySelectorAll('.active');
	let modal = document.querySelector('.dialog');
	let close = document.querySelectorAll('.close');
	let sub = document.querySelectorAll('.sub');
	let movalVar = document.querySelectorAll('.modalVar');

	let dwy = document.querySelector('.dwy');

	close[0].onclick = function() {
		dialog.style.display = 'none';
	}

	sub[0].onclick = function() {
		dialog.style.display = 'none';
	}
	let mon = '<?php echo $mon;?>';
	for (let i = 0; i < active.length; i++) {
		active[i].addEventListener('click', () => {
			if (active[i].querySelector('.cos').value != '' || active[i].querySelector('.pro').value != '') {
				modal.style.display = 'block';
				let temp = active[i].querySelector('.dwy').value;
				let year = "<?php echo date('Y'); ?>";
				modal.querySelector('.tm').innerText = temp + "." + year;
				let help;

				if (active[i].querySelector('.pro').value != '') help = active[i].querySelector('.pro').value * mon;
				else help = '0';

				let help2;
				if (active[i].querySelector('.cos').value != '') help2 = active[i].querySelector('.cos').value * mon;
				else help2 = '0';
				movalVar[0].innerText = Math.round(help);
				movalVar[1].innerText = Math.round(help2);
				movalVar[2].innerText = Math.round(active[i].querySelector('.pro').value * mon - active[i]
					.querySelector('.cos')
					.value * mon);
			}

		});
	}
	</script>
	<script src="../script/skroll.js"></script>
	<script>
	var skroll = new Skroll()

		.add(".anim1", {
			animation: "fadeInUp",
			delay: 120,
			duration: 500,
			wait: 250
		})
		.add(".anim2", {
			animation: "flipInX",
			delay: 60,
			duration: 550
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
			duration: 1300,
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