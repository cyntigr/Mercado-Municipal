<!DOCTYPE html>
<html lang="es">

<head>
	<title>Mercado Municipal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mercado.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>

<body>

	<div class="navbar navbar-expand-lg navbar-light bg-light fondoNav">
		<a class="navbar-brand" href="inicio.php">Mercado Municipal</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="inicio.php">Inicio</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="#">Favoritos</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="perfil.php">Perfil</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="logout.php">Salir</a>
				</li>
			</ul>

		</div> <!-- end-collapse -->

		<div class="navbar-text blanco">
			<?= $usr->getNombre() ?> , bienvenid@
		</div>
		<img class="imgPerfil" src="img/<?= $usr->getFoto() ?>">

	</div> <!-- end-navbar -->