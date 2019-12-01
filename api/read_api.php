<?php

require_once "../clases/Puesto.php";
require_once "../clases/PdoDatabase.php";
require_once "../clases/Usuario.php";
require_once "../clases/Sesion.php";
// obtenemos la instancia de la sesión
$ses = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
	$ses->redirect("index.php");

/**
 */

function infoPuesto($id)
{
	// obtenemos información sobre la serie
	$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
	$sql = "SELECT * FROM puesto WHERE idPuesto = ? ; ";
	$parametros = [$id];
	if ($db->queryPdo($sql, $parametros)) :
		$puesto = $db->getObject("Puesto");
		return [
			"Id"                => $puesto->getIdPuesto(),
			"Nombre Puesto"     => $puesto->getNombre(),
			"Imagen"            => $puesto->getFoto(),
			"Informacion"       => $puesto->getInfoPuesto()
		];
	endif;

	return [
		"Codigo" => 500,
		"Mensaje" => "No se encuentra el puesto indicado"
	];
}

function infoGlobal()
{
	// obtenemos todas las series
	$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
	$sql = "SELECT * FROM puesto; ";
	$parametros = [];
	$db->queryPdo($sql, $parametros);
	$arr = array();
	while ($row = $db->getObject("Puesto")) {
		$arr[] = [
			"Id"                => $row->getIdPuesto(),
			"Nombre Puesto"     => $row->getNombre(),
			"Imagen"            => $row->getFoto(),
			"Informacion"       => $row->getInfoPuesto()
		];
	}

	return $arr;
}

function infoUsuario($idUsu)
{
	// obtenemos información sobre la serie
	$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
	$sql = "SELECT * FROM usuario WHERE idUsuario = ? ; ";
	$parametros = [$idUsu];
	if ($db->queryPdo($sql, $parametros)) :
		$usuario = $db->getObject("Usuario");
		return [
			"Id Usuario"       => $usuario->getIdUsuario(),
			"Nombre"           => $usuario->getNombre(),
			"Apellidos"        => $usuario->getApellido(),
			"Email"     	   => $usuario->getEmail(),
			"Telefono"		   => $usuario->getTelefono(),
			"Foto"			   => $usuario->getFoto(),
			"Api"			   => $usuario->getApi()
		];
	endif;

	return [
		"Codigo" => 500,
		"Mensaje" => "No se encuentra el puesto indicado"
	];

}

// comprobamos si existe la API_KEY
$apiKey = $_GET["apiKey"];

// buscamos en la base de datos el usuario relacionado con la api
$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
$sql = "SELECT * FROM usuario WHERE apiKey = ? ; ";
$parametros = [$apiKey];
$db->queryPdo($sql, $parametros);

$usuario = $ses->getUsuario();
$idTwo = $usuario->getIdUsuario();
$idOne = $db->getObject("Usuario")->getIdUsuario();

//comprobamos que la api coincide con el usuario que la esta utilizando
if (!($idOne == $idTwo)) :

	//Le indicamos al usuario que la api que esta utilizando no está bien
	$data = [
		"Codigo" => 400,
		"Mensaje" => "No me has proporcionado una api correcta, vuelve a introducirla.",
	];

else :
	// Si coinciden los usuarios hacemos la llamada 
	// si enviamos id nos traemos el puesto en concreto si existe,
	// y sino enviamos id, nos traemos todos los puestos que tenemos registrados
	// si mandamos idUsuario con yes mostramos la info del usuario
	if (!empty($_GET["id"])) :
		$id   = $_GET["id"];
		$data = infoPuesto($id);
	elseif(empty($_GET["idUsuario"])) :
		$data = infoGlobal();
	else:
		$data = infoUsuario($idTwo);
	endif;

endif;


// devolvemos el contenido especificando que es JSON
header("Content-Type: application/json;");
header("charset=utf-8");

echo json_encode($data);
