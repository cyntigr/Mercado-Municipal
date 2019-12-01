<?php
require_once "clases/Sesion.php";
// obtenemos la instancia de la sesión
$ses = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
	$ses->redirect("index.php");

$usr = $ses->getUsuario();

include_once "navbar.php";
?>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
	$(document).ready(function() {

		// realiza una petición AJAX
		// mediante un get le mandamos la p con el numero de pagina
		function loadShows() {
			$.ajax({
				method: "GET",
				url: "operaciones/consulta.php",
				data: {
					"p": pag
				},

			}).done(function(data) {
				$("#content").append(data);
				pag++;

			});
		}

		var pag = 1;
		// si pulso el botón ejecuto función para cargar los 
		// puestos del mercado en el caso de no cargar automáticamente
		$("#buscar").click(function() {
			loadShows();
		});

		// si hace scroll en la pantalla ejecuta la funcion para
		// cargar más tiendas si es necesario
		$(window).scroll(function() {

			if ($(window).scrollTop() + $(window).height() >=
				$(document).height())
				loadShows();

		});


		// mostrar las series de la primera página
		loadShows();

	});
</script>
<div id="content"></div>
<button id="buscar" type="button" class="margenBtn btn btn-success btn-ses">Mostrar más</button>
</body>

</html>