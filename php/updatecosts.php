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

				$result = $mysqli->query("SELECT * FROM `costs` WHERE `id` = $i");
				$var = $result->fetch_assoc();

			?>

			<form action="update.php" method="post" class="rd">
				<input type="hidden" value="<?php echo $i;?>" name="temp">
				<div class="transactions">
					<div class="account_title">
						Зміна транзакції <input type="date" name="date" value="<?php echo $var['date']?>">
					</div>
					<div class="account_name">
						<span class="green green2 red3"><input type="text" value="<?php echo $var["type"] ?>" name="type"></span>
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
								<span class="green red3">-
									<input type="type" name="cost" value="<?php echo $var['cost']?>"> <?php echo $vars["currency"];?>
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