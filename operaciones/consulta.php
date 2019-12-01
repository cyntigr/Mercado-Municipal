<?php

require_once "../clases/PdoDatabase.php";
require_once "../clases/Puesto.php";

define("MAX_COL", 4);	// número de columnas


/*
	 * Realiza una búsqueda paginada de  series en la base de datos 
	 */
function search()
{
	// obtenemos el número de página
	// si no se nos pasa ninguna, fijamos la primera
	$pag = isset($_GET["p"]) ? $_GET["p"] : 1;
	$maximo = 8;

	// determinamos el punto de partida para la consulta
	$ini = ($pag - 1) * $maximo;

	// buscamos los puestos
	$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");

	$sql = "SELECT * FROM puesto LIMIT ?, ? ;";
	$parametros = [$ini, $maximo];

	// buscamos los puestos correspondientes a la página actual
	if ($db->queryPdo($sql, $parametros, true)) :
		do {
			echo "<div class=\"row mb-2\">";
			$col = 0;
			while (($col < MAX_COL) && ($item = $db->getObject("Puesto"))) :
				?>
				<div class="col col-lg-3" >
					<div class="card" style="width:300px">
						<img class="card-img-top" src="img/<?=$item->getFoto()?>" alt="Card image">
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

$cop = $_GET["cop"] ?? 0;
search();
?>