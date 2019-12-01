<?php
//referencia a la clase necesaria
require_once "../clases/PdoDatabase.php";
require_once "../clases/Sesion.php";
require_once "../clases/Usuario.php";
// obtenemos la instancia de la sesión
$ses = Sesion::getInstance();
$usr = $ses->getUsuario();

$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");

// creamos la query para borrar el usuario
$sql = "DELETE FROM usuario WHERE idUsuario = ?";
$parametros = [$usr->getIdUsuario()];
$db->queryPdo($sql, $parametros);
$ses->close() ;
$ses->redirect("../index.php");

?>