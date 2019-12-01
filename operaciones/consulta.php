<?php

require_once "../clases/PdoDatabase.php";
require_once "../clases/Puesto.php";
require_once "../clases/Sesion.php";
// obtenemos la instancia de la sesión
$ses = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
	$ses->redirect("index.php");
$usr = $ses->getUsuario();
$id = $usr->getIdUsuario();
define("MAX_COL", 4);	// número de columnas

/*
	 * Realiza una búsqueda paginada de  series en la base de datos 
	 */
function search($id)
{
	// obtenemos el número de página
	// si no se nos pasa ninguna, fijamos la primera
	$pag = isset($_GET["p"]) ? $_GET["p"] : 1;
	$maximo = 8;

	// determinamos el punto de partida para la consulta
	$ini = ($pag - 1) * $maximo;

	// buscamos los puestos
	$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
	if(empty($_GET["favorit"])):
		$sql = "SELECT * FROM puesto LIMIT ?, ? ;";
		$parametros = [$ini, $maximo];
	else:
		$sql = "SELECT P.idPuesto, P.nombre, P.telefono, P.foto, P.idUsuario, P.infoPuesto FROM puesto P 
		LEFT JOIN favorito F ON P.idPuesto = F.idPuesto LEFT JOIN
		usuario U ON F.idUsuario = U.idUsuario WHERE F.idUsuario = ? LIMIT ?,? ";
		$parametros = [$id,$ini, $maximo];

	endif;
	

	// buscamos los puestos correspondientes a la página actual
	if ($db->queryPdo($sql, $parametros, true)) :
		do {
			echo "<div class=\"row mb-2\">";
			$col = 0;
			while (($col < MAX_COL) && ($item = $db->getObject("Puesto"))) :
				?>
				<div class="col col-lg-3" >
					<div class="card" style="width:300px">
						<img class="card-img-top" style="height:200px" src="img/<?=$item->getFoto()?>" alt="Card image">
						<div class="card-body">
							<h4 class="card-title"><a href="infoPuesto.php?id=<?=$item->getIdPuesto()?>"><?= $item->getNombre() ?></a></h4>
						</div>
					</div>
				</div> <!-- end-col -->

<?php
				$col++;
			endwhile;
			echo "</div>";
		} while ($item);

	endif;
}
search($id);
?>