<?php

require "controladores/controladorUsuarios.php";
require "controladores/db.php";
require "usuario.php";

?>

<?php

session_start();

registrarUsuario();

if (isset($_POST["registrarUsuario"])) {

    $usuario = obtenerUsuario($_POST["Nombre"], $_POST["Contraseña"]);

    if ($usuario) {

        hacerLogin($usuario);

    } else {
        $error = "El usuario o la contraseña no son validos";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="container" id="registrar">

        <div class="col-md-4 p-3 border bg-light registro">
            <form action="registrar.php" method="post">
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="Nombre" class="form-control" id="Nombre" name = "Nombre">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" name = "exampleInputEmail1" id="exampleInputEmail1" aria-describedby ="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="Usuario" class="form-label">Usuario</label>
                    <input type="Usuario" class="form-control" id="Usuario" name = "Usuario">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="Contraseña" name = "Contraseña">
                </div>
                <button type="submit" class="btn btn-dark" id = "registrarUsuario" name = "registrarUsuario" value = "registrarUsuario">Registrar</button>
            </form>
        </div>
    </div>
</body>

</html>