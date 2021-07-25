<?php
		require_once "parse2.php";

	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/trans.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


	<title>Витрати</title>
</head>

<body>
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
						</a>
						<a href="logout.php" class="btn-icon">
							<img src="../img/person.png" alt="Вихід">
						</a>
					</div>
				</div>
			</header>
			<div class="main">
				<div class="header-main ">
					<div><a href="../index.php">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
								xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" widtd="346px" height="346px"
								viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">
								<g>
									<g id="chevron-left">
										<polygon points="247.35,35.7 211.65,0 58.65,153 211.65,306 247.35,270.3 130.05,153 		" />
									</g>
							</svg></a>
						<div>
							<h3>Транзакції по витратам</h3>
						</div>
					</div>
					<div>
						<input type="text" placeholder="Пошук" id="search" onkeyup="filter()">
					</div>
				</div>
				<div class="trans">
					<table>
						<tr class="table-border">
							<td>Назва</td>
							<td>Сума</td>
							<td>Дата</td>
							<td>Рахунок</td>
						</tr>
						<?php 
						$pofit >= $cost ? $tmp = $cost : $tmp = $profit;
						// $i = date('Y-m-d', strtotime($thisDate." - 0 day"));
						// // echo $i;
						// echo $vars_profit[10]["date"];
						// if($i < $vars_profit[10]["date"];)

						for($i = 0; $i < $tmp; $i++){
							
							// if($vars_profit[$i]["profit"] != ''){
							// 		switch($vars_profit[$i]["type"]){
							// 			case "Зарплата": $tmp2 = "zp"; break;
							// 			case "Стипендія": $tmp2 = "stp"; break;
							// 			case "Подарунок": $tmp2 = "present"; break;
							// 			default: $tmp2 = "others";
							// 		}
									
							// 		echo '<tr class="table-border">
							// 			<td><div><img src="../img/'.$tmp2.'.png" alt=""><div class="green help">'.$vars_profit[$i]["type"].'</div></div></td>
							// 			<td><font class="gr">+ '.$vars_profit[$i]["profit"].' '.$vars["currency"].'</font></td>
							// 			<td><font class="dt">'.$vars_profit[$i]["date"].'</font></td>
							// 			<td><font class="dt help2">'.$vars_profit[$i]["account"].'</font></td>
							// 			</tr>';
								
								
							// }

							if($vars_cost[$i]["cost"] != ''){
								
								switch($vars_cost[$i]["type"]){
									case "Квартира та дім": $tmp2 = "apartment"; break;
									case "Товари": $tmp2 = "goods"; break;
									case "Подарунок": $tmp2 = "presentfor"; break;
									default: $tmp2 = "others2";
								}
								echo '<tr class="table-border">
									<td><div><img src="../img/'.$tmp2.'.png" alt=""><div class="red help">'.$vars_cost[$i]["type"].'</div></div></td>
									<td><font class="rd">- '.round($vars_cost[$i]["cost"]*$mon).' '.$vars["currency"].'</font></td>
									<td><font class="dt">'.$vars_cost[$i]["date"].'</font></td>
									<td><font class="dt help2">'.$vars_cost[$i]["account"].'</font></td>
								</tr>';
							
							}
						}
					
						
						?>
					</table>
				</div>
			</div>
		</div>
	</div>


	<script>
	function filter() {
		let input, filter, tr, a;
		tr = document.querySelectorAll('tr');
		tr2 = document.querySelectorAll('.help2');
		input = document.querySelector('#search');
		filter = input.value.toUpperCase();
		console.log(tr2[2].innerText.toUpperCase());
		console.log(filter);

		for (let i = 1; i < tr.length; i++) {
			a = tr[i].querySelector('.help');
			if (a.innerText.toUpperCase().indexOf(filter) > -1 || tr2[i - 1].innerText.toUpperCase().indexOf(filter) > -1)
				tr[i].style.display = '';
			else tr[i].style.display = 'none';

		}


		// for(let i = 0; i < tr2.length; i++){
		// 	if(tr2[i].innerText.toUpperCase().indexOf(filter) > -1 )
		// 		tr[i+1].style.display = '';
		// 	else tr[i+1].style.display = 'none';

		// }

	}
	// a.innerHTML.toUpperCase().indexOf(filter) > -1 ||
	</script>
	<script src="../script/skroll.js"></script>
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