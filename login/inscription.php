<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Inscription </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<span class="login100-form-title-1">
						Inscription 
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="singin.php">

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Pseudo</span>
						<input class="input100" type="text" name="pseudo" placeholder="Enter Username">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Save
						</button>

						<a class="login100-form-btn" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>