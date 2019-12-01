<?php
//referencia a la clase necesaria
require_once "clases/PdoDatabase.php";
require_once "clases/Sesion.php";
require_once "clases/Usuario.php";
// obtenemos la instancia de la sesión
$ses = Sesion::getInstance();

// comprobar si hay una sesión activa
if (!$ses->checkActiveSession())
    $ses->redirect("index.php");

$usr = $ses->getUsuario();

include_once "navbar.php";

if (!empty($_POST)) :
    // Recogemos datos del formulario para introducirlos en la base de datos
    $ema = $_POST["email"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellido"];
    $tlf = $_POST["telefono"];
    if(empty($_POST["foto"])):
        $fot = $usr->getFoto();
    else:
        $fot = $_POST["foto"];
    endif;
    $id = $usr->getIdUsuario();
    $db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
    // creamos la query para modificar el usuario
    $sql = "UPDATE usuario SET nombre = ?,apellido = ?,email = ?,telefono = ?,foto = ? ";
    $sql .= " WHERE idUsuario = ? ;";
    $parametros = [$nom, $ape, $ema, $tlf, $fot, $id];
    if ($db->queryPdo($sql, $parametros)) :
        $correcto = "Datos modificados correctamente";
    else :
        $error = "No se han modificado los datos";
    endif;
endif;
$db = PdoDatabase::getInstance("root", "", "mercadomunicipal");
$sql = "SELECT * FROM usuario WHERE idUsuario = ? ;";
    $parametros = [$usr->getIdUsuario()];
    $db->queryPdo($sql, $parametros);
    //traemos el usuario de la base de datos
    $usuario = $db->getObject("Usuario") ;

?>
<script>
	$(document).ready(function() {
		$("#delete").click(function() {
			window.location.href = "operaciones/borrarUsuario.php";
		});
	});
</script>

<div id="posicionFoto">
    <img class="fotoPerfil" src="img/<?= $usuario->getFoto() ?>">
</div>

<!-- formulario de modificación usuario -->
<form method="post" action="perfil.php">

    <!-- foto -->
    <div class="row form-group">
        <div class="col-md-4 mx-auto">
            <label class="col-form-label" for="foto">Foto de perfil:</label>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="foto">
                <label class="custom-file-label" for="foto">Elige la foto</label>
            </div>
        </div>
    </div>

    <!-- correo electronico -->
    <div class="row form-group">
        <div class="col-md-4 mx-auto">
            <label class="col-form-label" for="email">Correo Electrónico:</label>
            <input class="form-control" value="<?= $usuario->getEmail() ?>" type="email" name="email" placeholder="email@flixnet.com" required />
        </div>
    </div>

    <!-- nombre -->
    <div class="row form-group">
        <div class="col-md-4 mx-auto">
            <label class="col-form-label" for="nombre">Nombre:</label>
            <input class="form-control" value="<?= $usuario->getNombre() ?>" type="text" name="nombre" required />
        </div>
    </div>

    <!-- apellidos -->
    <div class="row form-group">
        <div class="col-md-4 mx-auto">
            <label class="col-form-label" for="apellido">Apellidos:</label>
            <input class="form-control" value="<?= $usuario->getApellido() ?>" type="text" name="apellido" required />
        </div>
    </div>

    <!-- telefono -->
    <div class="row form-group">
        <div class="col-md-4 mx-auto">
            <label class="col-form-label" for="telefono">Teléfono:</label>
            <input class="form-control" value="<?= $usuario->getTelefono() ?>" type="text" name="telefono" required />
        </div>
    </div>

    <!-- update -->
    <div class="row form-group">
        <div class="col-md-4 mx-auto">
            <button class="btn btn-success btn-ses w-100" type="submit">Guardar cambios</button>
        </div>
    </div>
</form>
<!-- baja -->
<div class="row form-group">
    <div class="col-md-4 mx-auto">
        <button type="button" class="btn btn-danger btn-ses w-100" data-toggle="modal" data-target="#myModal">Dar de baja</button>
    </div>
</div>
<!-- Modal de borrar -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body">
                ¿ Estas seguro que quieres eliminar tu perfil ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <button type="button" id="delete" class="btn btn-success">Si</button>
            </div>

        </div>
    </div>
</div>
<?php
if (isset($error)) :
    echo "<div class=\"alert alert-danger w-50 mx-auto\" style=\"margin-bottom:20px\">";
    echo $error;
    echo "</div>";
endif;
if (isset($correcto)) :
    echo "<div class=\"alert alert-success w-50 mx-auto\" style=\"margin-bottom:20px\">";
    echo $correcto;
    echo "</div>";
endif;
?>
</div> <!-- Cierre div general-->
</body>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>