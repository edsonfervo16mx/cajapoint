<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once '../inc/header.php'; ?>
	<link rel="shortcut icon" href="../public/images/fav-icon-cajapoint-logo.ico" />
	<!-- Bootstrap core CSS -->
	<link href="../public/bootstrap/css/bootstrap.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../public/main/sign-in.css" rel="stylesheet">
	<link rel="stylesheet" href="../public/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
</head>
<body class="text-center">
	<form class="form-signin">
		<img class="mb-4" src="../public/images/cajapoint-logo.png" alt="" width="100" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
		<label for="inputEmail" class="sr-only">Correo Electrónico</label>
		<input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico / Usuario caja" required autofocus>
		<label for="inputPassword" class="sr-only">Contraseña</label>
		<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
		<div class="checkbox mb-3">
		<label class="radio-inline">
		  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> Administrador
		</label>
		<label class="radio-inline">
		  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Caja
		</label>
		<br>
		<label>
			<a href="#">Recuperar mi contraseña</a>
		</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
		<p class="mt-5 mb-3 text-muted text-left">
			<a href="../">
				<span class="icon">
					<i class="fa fa-angle-left"></i>
				</span>
				Volver
			</a>
		</p>
	</form>
</body>
</html>