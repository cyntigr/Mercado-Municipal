<?php
require_once('clases/PdoDatabase.php');
if (!empty($_POST)) :

    // Recogemos datos del formulario para introducirlos en la base de datos
    $ema = $_POST["email"];
    $nom = $_POST["nombre"];
    $ape = $_POST["apellido"];
    $tlf = $_POST["telefono"];
    if (empty($_POST["foto"])) :
        $fot = "tio.jpg";
    else :
        $fot = $_POST["foto"];
    endif;

    $pas = $_POST["pass"];
    $con = $_POST["conf"];
    $idTipo = 3;

    // comprobar que las contraseñas son iguales
    if ($pas == $con) :

        $db = PdoDatabase::getInstance("root", "", "mercadomunicipal");

        // creamos la query para insertar el nuevo usuario
        $sql = "INSERT INTO usuario (nombre,apellido,email,password,idTipo,telefono,foto) ";
        $sql .= "VALUES ( ?, ?, ?, md5(?),?, ?, ?) ;";
        $parametros = [$nom, $ape, $ema, $pas, $idTipo, $tlf, $fot];
        
        if($db->queryPdo($sql, $parametros)):
            $correcto = "Se ha dado de alta correctamente";
        else:
            $error = "Hay un problema de registro";
        endif;
        
    else :
        $error = "Las contraseñas no coinciden";
    endif;

endif;


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>· Mercado Municipal ·</title>
    <meta charset="utf8" />
    <link rel="stylesheet" type="text/css" href="css/mercado.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<script>
    $(document).ready(function() {
        $("#regist").click(function() {
            window.location.href = "index.php";
        });
    });
</script>


<body id="fondo">
    <div id="conte">
        <div class="container">

            <!-- Titulo -->
            <div class="row">
                <div class="col-sd-12 mx-auto">
                    <h1>Mercado Municipal</h1>
                </div>
            </div>

            <!-- nota -->
            <div class="row">
                <div class="col-sd-12 mx-auto mb-5">
                    <h4>Nuevo Usuario</h4>
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

            <!-- formulario de registro nuevo usuario -->
            <form method="post">

                <!-- correo electronico -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="email">Correo Electrónico:</label>
                        <input class="form-control" type="email" name="email" placeholder="email@flixnet.com" required />
                    </div>
                </div>

                <!-- nombre -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="nombre">Nombre:</label>
                        <input class="form-control" type="text" name="nombre" required />
                    </div>
                </div>

                <!-- apellidos -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="apellidos">Apellidos:</label>
                        <input class="form-control" type="text" name="apellido" required />
                    </div>
                </div>

                <!-- telefono -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="apellidos">Teléfono:</label>
                        <input class="form-control" type="text" name="telefono" required />
                    </div>
                </div>

                <!-- contraseña -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="pass">Contraseña:</label>
                        <input class="form-control" type="password" name="pass" required />
                    </div>
                </div>

                <!-- confirmación contraseña -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="conf">Confirmación contraseña:</label>
                        <input class="form-control" type="password" name="conf" required />
                    </div>
                </div>

                <!-- foto -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <label class="col-form-label" for="foto">Foto de perfil:</label>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                            <label class="custom-file-label" for="foto">Elige la imagen</label>
                        </div>
                    </div>
                </div>

                <!-- registro -->
                <div class="row form-group">
                    <div class="col-md-4 mx-auto">
                        <button class="btn btn-success btn-ses w-100" type="submit">Registrar</button>
                    </div>
                </div>
            </form>

            <!-- volver atrás -->
            <div class="row">
                <div class="col-md-4 mx-auto text-center">
                    <button type="button" id="regist" class="btn btn-success btn-ses w-100" role="button">Volver atrás</button>
                </div>
            </div>

        </div> <!-- container -->

        <br />
    </div>
</body>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>