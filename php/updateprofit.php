<?php
	require_once 'main.php';
	if(!isset($_SESSION['login'])){
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../img/favicon.ico">
	<title>Зміна</title>

	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/changetrans.css">
	
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
					<!-- <div class="typeOfMoney">
						<span>
							<button id="but"><img src="../img/ukraine.png" id="flag"><span id="fss">Змінити валюту</span>
								<input type="hidden" value="<?php echo  $vars[" currency"] ?>" id="inpmoney">
							</button>

							<div class="typeSelect">
								<form action="php/typemoney.php" id="typemoney1" method="post">
									<div class="money" onclick="submitform1();"><img src="../img/ukraine.png"
											alt=""><span>Украинская</span>
										<font>₴</font>
										<input type="hidden" value=" грн." name="input">
									</div>
								</form>
								<form action="php/typemoney.php" id="typemoney2" method="post">
									<div class="money" onclick="submitform2();"><img src="../img/Russia.png"
											alt=""><span>Российский</span>
										<font>₽</font>
										<input type="hidden" value=" RUB" name="input">
									</div>
								</form>
								<form action="php/typemoney.php" id="typemoney3" method="post">
									<div class="money" onclick="submitform3();"><img src="../img/Uk.png"
											alt=""><span>Английский</span>
										<font>$</font>
										<input type="hidden" value=" $" name="input">
									</div><span>
							</div>
							</form>
						</span>
					</div> -->
					<div class="menu">
						<a href="" class="btn-icon">
							<img src="../img/give.png" alt="">
						</a>
						<a href="" class="btn-icon">
							<img src="../img/get.png" alt="">
						</a>
						<a href="" class="btn-icon">
							<img src="../img/need.png" alt="">
						</a>
						<a href="" class="btn-icon">
							<img src="../img/aim.png" alt="">
						</a>
						<a href="" class="btn-icon">
							<img src="../img/set.png" alt="">
						</a>
						<a href="" class="btn-icon">
							<img src="../img/person.png" alt="">
						</a>
					</div>
				</div>
			</header>

			<?php
				require_once 'main.php';
				$i = $_GET['id'];

				$result = $mysqli->query("SELECT * FROM `profit` WHERE `id` = $i");
				$var = $result->fetch_assoc();

			?>

			<form action="update.php" method="post">
				<input type="hidden" value="<?php echo $i;?>" name="temp">
				<div class="transactions">
					<div class="account_title">
						Зміна транзакції <input type="date" name="date" value="<?php echo $var['date']?>">
					</div>
					<div class="account_name">
						<span class="green green2"><input type="text" value="<?php echo $var["type"] ?>" name="type"></span>
						<div class="pl-minus">
							<span class="money">
								<font id="nal-card"><select name="account" id="account">
										<option value="<?php echo $var['account']?>" >
											<?php echo $var['account']?>
										</option>
										<option value="<?php if($var['account'] == "Карта") echo "Готівкові гроші" ; else
											echo "Карта" ?>">
											<?php if($var['account'] == "Карта") echo "Готівкові гроші"; else echo "Карта"?>
										</option>
									</select>
								</font>
								<span class="green">+
									<input type="type" name="profit" value="<?php echo $var['profit']?>"> <?php echo $vars["currency"];?>
								</span>
							</span>

						</div>
					</div>
					<div class="alr">
						<button type="submit">Підтвердити</button>
					</div>
					
				</div>
				
			</form>
		
		</div>
	</div>
</body>

</html>