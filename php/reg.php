<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Реєстрація</title>
	<link rel="stylesheet" type="text/css" href="../css/login.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</head>
<?php
	require_once 'connect.php';
	$query = "SELECT * FROM `Person` ORDER by id";
	$vars = [];
	$i = 0;
	$count;
	if ($result = $mysqli->query($query)) {
		 while ($var = $result->fetch_assoc()) {
			  $vars[$i]["id"] = $var["id"];
			  $vars[$i]["name"] = $var["name"];
			  $vars[$i]["surname"] = $var["surname"];
			  $vars[$i]["mail"] = $var["mail"];
			  $vars[$i]["currency"] = $var["currency"];
			  $vars[$i]["password"] = $var["password"];
			  $i++;
		 }
		 $count = $i;
	}
?>

<body>
	<div class="wrap wrapreg">
		<div class="img"><img src="../img/logo-auth.png" alt="" class="animate__animated animate__swing">
			<span class="mt-3">www.shkasmode.com</span>
		</div>
		<div class="login reg">
			<span>Реєстрація</span>
			<form onsubmit="subreg(this); return false;">
				<div class="w100 w1003">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
						id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
						xml:space="preserve">
						<g>
							<g>
								<path
									d="M255.999,0c-74.443,0-135,60.557-135,135s60.557,135,135,135s135-60.557,135-135S330.442,0,255.999,0z" />
							</g>
						</g>
						<g>
							<g>
								<path
									d="M478.48,398.68C438.124,338.138,370.579,302,297.835,302h-83.672c-72.744,0-140.288,36.138-180.644,96.68l-2.52,3.779V512    h450h0.001V402.459L478.48,398.68z" />
							</g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
					</svg>
					<input type="text" name='name' placeholder="Ім'я" required minlength="3">
				</div>
				<div class="w100 w1003">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
						id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
						xml:space="preserve">
						<g>
							<g>
								<path
									d="M255.999,0c-74.443,0-135,60.557-135,135s60.557,135,135,135s135-60.557,135-135S330.442,0,255.999,0z" />
							</g>
						</g>
						<g>
							<g>
								<path
									d="M478.48,398.68C438.124,338.138,370.579,302,297.835,302h-83.672c-72.744,0-140.288,36.138-180.644,96.68l-2.52,3.779V512    h450h0.001V402.459L478.48,398.68z" />
							</g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
						<g>
						</g>
					</svg>
					<input type="text" name='surname' placeholder="Фамілія" required minlength="3">
				</div>
				<div class="w100"><svg xmlns="http://www.w3.org/2000/svg" fill="none" height="27" viewBox="0 0 34 27"
						width="34">
						<path
							d="M28.5 25.6H5.5C3.4 25.6 1.70001 23.8929 1.70001 21.7841V5.41592C1.70001 3.30714 3.4 1.59998 5.5 1.59998H28.5C30.6 1.59998 32.3 3.30714 32.3 5.41592V21.7841C32.4 23.8929 30.6 25.6 28.5 25.6Z"
							stroke="#4F4F4F" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" />
						<path d="M17 14.9557L2.60001 3.60834" stroke="#4F4F4F" stroke-linecap="round" stroke-linejoin="round"
							stroke-miterlimit="10" stroke-width="2" />
						<path d="M31.4 3.60834L17 14.9557" stroke="#4F4F4F" stroke-linecap="round" stroke-linejoin="round"
							stroke-miterlimit="10" stroke-width="2" />
					</svg>
					<input type="email" placeholder="E-mail" name='mail' required>
				</div>
				<div class="w100 w1002"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
						version="1.1" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;"
						xml:space="preserve">
						<g id="Layer_43">
							<g>
								<g>
									<path style="fill:#95CC29;"
										d="M26.999,16c-2.761,0-5,2.239-5,5c0,0.643,0.133,1.254,0.354,1.818L16,29.172V32h2.827l6.353-6.353     C25.745,25.868,26.355,26,26.999,26c2.761,0,5-2.239,5-5S29.76,16,26.999,16z M26.999,20c-0.552,0-1-0.448-1-1s0.448-1,1-1     s1,0.448,1,1S27.55,20,26.999,20z" />
								</g>
								<g>
									<path style="fill:#666666;"
										d="M13,0C6.924,0.001,2,4.924,2,11v3.184C0,14.597,0,15.695,0,17v12c0,1.657,1.341,2.999,2.999,3H14     v-2H2.999C2.447,29.999,2,29.552,2,29V17c0-0.552,0.447-0.999,0.999-1h19.957l0.305,0.026l0.007-0.08     c0.163-0.046,0.318-0.118,0.439-0.239C23.893,15.521,24,15.263,24,15v-4C24,4.924,19.075,0.001,13,0z M22,14H4v-3     c0-2.489,1.005-4.732,2.635-6.364C8.267,3.006,10.51,2,12.999,2c2.488,0,4.733,1.006,6.365,2.636C20.994,6.268,22,8.511,22,11V14     z" />
									<path style="fill:#666666;"
										d="M12.999,18c-1.656,0.002-2.998,1.342-2.999,3C10.001,22.305,10,23.402,12,23.816V27     c0,0.552,0.448,1,1,1s1-0.448,1-1v-3.184c2-0.414,1.998-1.511,1.999-2.816C15.998,19.342,14.655,18.002,12.999,18z M12.999,22     c-0.549-0.001-0.999-0.451-1-1c0.001-0.549,0.451-0.999,1-1c0.549,0.001,0.999,0.451,1,1C13.998,21.549,13.547,21.999,12.999,22z     " />
								</g>
							</g>
							<rect style="fill:none;" width="32" height="32" />
						</g>
						<g id="Layer_1">
						</g>
					</svg>
					<input type="password" name='password' required placeholder="Пароль" minlength="3">
				</div>
				<button type="submit" class="animate__animated animate__flash">Створити</button>
			</form>
			<a href="login.php" class="reg reg2">Ввійти ➝</a>
		</div>
	</div>
	<script>
	let emails = '<?php 
			for($i = 0; $i < $count; $i++)
				echo $vars[$i]["mail"]." ";
		?>';
	emails = emails.split(' ');
	console.log(emails);

	function subreg(el) {
		let count = "<?php echo $count;?>";
		let email = document.querySelectorAll('input');
		email = email[2].value;
		el.method = 'post';
		el.action = 'checkreg.php';

		let y = 0;
		for (let i = 0; i < count; i++)
			if (email == emails[i]) {
				alert('Є такий користувач');
				y++;
			}


		if (y == 0) el.submit();
	}
	</script>
</body>

</html>