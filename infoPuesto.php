<?php
require_once "clases/Sesion.php";
require_once "clases/Puesto.php";
require_once "clases/PdoDatabase.php";

// obtenemos la instancia de la sesión
$ses = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
	$ses->redirect("index.php");

$usr = $ses->getUsuario();
$id = $_GET["id"];
include_once "navbar.php";

$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
$sql = "SELECT * FROM puesto WHERE idPuesto = ? ;";
$parametros = [$id];
$db->queryPdo($sql, $parametros);
$puesto = $db->getObject("Puesto");

?>
<div>
	<img src="img/<?= $puesto->getFoto() ?>" class="img-thumbnail mx-auto d-block w-35" alt="<?= $puesto->getFoto() ?>">

	<h5 class="text-center"><?= $puesto->getNombre() ?></h5>
	<div class="mx-auto w-35">
		<p class="text-justify"><?= $puesto->getInfoPuesto() ?></p>
	</div>
</div>
</body>

</html>