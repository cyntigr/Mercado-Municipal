<?php
//referencia a la clase necesaria
require_once("clases/Sesion.php");

// sesión instanciada
$ses = Sesion::getInstance();

// comprueba si esta iniciada la sesion
if ($ses->checkActiveSession())
	$ses->redirect("inicio.php");

// miramos si tenemos información en la variable global $_POST
if (!empty($_POST)) :

	$email        = $_POST["email"];
	$contrasena   = $_POST["contrasena"];

	// hacemos el login
	$ok  = $ses->login($email, $contrasena);

	// si el login se ha hecho bien, redirigimos a la página principal
	if ($ok) $ses->redirect("inicio.php");

endif;

if (!empty($_GET)) :
	$inicio = $_GET["iniciar"];
endif;

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>· Mercado Municipal ·</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mercado.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<script>
	$(document).ready(function() {
		$("#regis").click(function() {
			window.location.href = "registro.php";
		});
	});
</script>

<body id="fondo">
	<div id="cont">

		<div id="contenedor">
			<h1 class="titulo">Mercado Municipal</h1>
			<?php
			if (!isset($inicio)) :
				?>

				<button type="submit" form="envia" class="btn btn-success btn-ses">Iniciar Sesión</button>
				<button type="button" id="regis" class="btn btn-success btn-ses">Registro</button>
				<form method="get" id="envia">
					<input name="iniciar" type="hidden" value="Inicio">
				</form>
			<?php
			endif;
			if (isset($inicio)) :
				?>
				<form method="post" id="registro" autocomplete="off" class="form-inline">

					<!-- correo usuario -->
					<input class="form-control mb-2 mr-sm-2" type="text" name="email" placeholder="email@flixnet.com" required />

					<!-- contraseña usuario -->
					<input class="form-control mb-2 mr-sm-2" type="password" name="contrasena" placeholder="contraseña" required />

					<?php
						if ((isset($ok)) && (!$ok)) :
							?>
						<div class="col">
							<div class="col-md-12 text-center">
								<div class="alert alert-danger w-50" role="alert">
									Usuario o contraseña incorrectas.
								</div>
							</div>
						</div>
					<?php
						endif;
						?>
					<!-- botón LOGIN -->
					<button class="arriba btn btn-success btn-ses" type="submit">Entrar</button>
				</form>
			<?php
			endif;
			?>
		</div> <!-- cierre contenedor -->

	</div> <!-- cierre cont -->

</body>

</html>