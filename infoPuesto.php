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
		<strong>Telefono Contacto: </strong><p><?= $puesto->getTelefono() ?></p>
	</div>
	<div class="mx-auto w-35 espacioFinal">
	<form method="post" id="favorito">
		<input name="favorito" type="hidden" value="si">
	</form>
	<form method="post" id="noFavorito">
		<input name="noFavorito" type="hidden" value="no">
	</form>
	<button class="btn btn-primary" form="favorito"  type="submit">Añadir Favoritos</button>
	<button class="btn btn-primary" form="noFavorito"  type="submit">Eliminar Favoritos</button>
	</div>
</div>
</body>
<?php
	// Con esto añadimos o quitamos de favoritos un puesto
	//
	$dbo = PdoDatabase::getInstance("root", "", "mercadomunicipal");
	if(!empty($_POST["favorito"])):
		$consulta = "INSERT INTO favorito(idUsuario, idPuesto) VALUES (?,?)";
		$param = [$usr->getIdUsuario(),$id];
		$dbo->queryPdo($consulta, $param);
	elseif(!empty($_POST["noFavorito"])):
		$consulta = "DELETE FROM favorito WHERE idUsuario = ? AND idPuesto = ?";
		$param = [$usr->getIdUsuario(),$id];
		$dbo->queryPdo($consulta, $param);
	endif;
 ?>
</html>