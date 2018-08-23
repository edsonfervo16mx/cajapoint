<?php 
	require_once 'core/config/Connection.php';
	require_once 'core/class/Autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'inc/header.php'; ?>
		<link rel="shortcut icon" href="public/images/fav-icon-cajapoint-logo.ico" />
		<!-- Bootstrap core CSS -->
		<link href="public/bootstrap/css/bootstrap.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="public/main/small-business.css" rel="stylesheet">
		<link rel="stylesheet" href="public/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
		<link rel="stylesheet" href="public/main/style.css">
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">CajaPoint</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Inicio
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">¿Como funciona?</a>
						</li>
						<li class="nav-item">
						<a class="btn btn-primary" href="web/login.php">Iniciar sesión</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Page Content -->
		<div class="container">
			<!-- Heading Row -->
			<div class="row my-4">
				<div class="col-lg-8">
					<img class="img-fluid rounded" src="public/images/900x400.png" alt="">
					<!-- Call to Action Well -->
					<div class="card text-white bg-action my-4 text-center">
						<div class="card-body">
							<p class="text-white m-0">
								Actualizaciones a la plataforma <strong>completamente gratis</strong>.
							</p>
						</div>
					</div>
				</div>
				<!-- /.col-lg-8 -->
				<div class="col-lg-4">
					<form action="web/procs/usuario.add.php" method="POST" onsubmit="return validarSubmit(this)">
						<h2>Punto de Venta Online</h2>
						<p>Comienza a optimizar los procesos de tu negocio, es fácil, rápido y seguro.</p>
						<div class="form-group">
							<label for="usuario">Nombre de usuario</label>
							<input type="text" name="usuario" id="usuario" class="form-control" placeholder="gerentejuan" required>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="tucorreo@example.com" required>
							<div class="invalid-feedback">
								Ya hay una cuenta vinculada a este correo
							</div>
						</div>
						<div class="form-group">
							<label for="password">Contraseña</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="********" required>
							<div class="invalid-feedback">
								Please provide a valid city.
							</div>
						</div>
						<!-- validar  -->
						<div class="alert alert-danger c-hidden" role="alert" id="notice">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<div id="notice-data">
								
							</div>
						</div>
						<!-- -->
						<input type="submit" class="btn btn-success btn-lg btn-block" value="Registrarme">
					</form>
				</div>
				<!-- /.col-md-4 -->
			</div>
			<!-- /.row -->
			
			<!-- Content Row -->
			<div class="row">
				<div class="col-md-12 mb-4 text-center">
					<?php 
						$tipoestablecimiento = new TipoEstablecimiento;
						$datos_tipo_establecimiento = $tipoestablecimiento->listarActivos($key);
						foreach ($datos_tipo_establecimiento as $col) {
							echo '
								<button class="btn btn-info btn-rounded btn-sm" type="button">
								  '.$col->clave.'
								</button>
							';
						}
					?>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
		<!-- Footer -->
		<footer class="py-5 bg-dark">
			<div class="container">
				<p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
			</div>
			<!-- /.container -->
		</footer>
		<!-- Bootstrap core JavaScript -->
		<script>
			var u = [
				{
					"email":"usuario@hotmail.com",
					"nombre":"usuario",
					"password":"123",
					"status":"active"
				},
				{
					"email":"usuario2@hotmail.com",
					"nombre":"usuario2",
					"password":"123",
					"status":"active"
				}
			];
			//console.log(u);
			
			function validarSubmit(f){
				for (var i = u.length - 1; i >= 0; i--) {
					if(f.elements["email"].value == u[i].email){
						//document.getElementById('notice').className = 'alert alert-danger';
						//document.getElementById('notice-data').innerHTML = '<strong>Error</strong>, email ya existe';
						document.getElementById('email').className = 'form-control is-invalid';
						return false;
					}else{
						return true;
					}
				}
			}
		</script>
		<script src="public/jquery/jquery.min.js"></script>
		<script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>

