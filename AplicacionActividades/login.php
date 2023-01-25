<?php

require "controladores/controladorUsuarios.php";
require "controladores/db.php";
require "usuario.php";

?>

<?php

session_start();

if (isset($_POST["login"])) {

    $usuario = obtenerUsuario($_POST["usuario"], $_POST["password"]);

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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-3 ">
            <form role="form" method="post" action="">

                <div class="container ">

                    <div class="col-6 gx-5 p-3 border bg-light registro">
                        <form>
                            <div class="mb-3">
                                <label for="inputUsuario" class="control-label col-sm-2">Usuario:</label>
                                <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuario">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="control-label col-sm-2">Contraseña:</label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
                            </div>
                            <div class="form-group row">
                                <div class="d-grid gap-2 d-md-block">
                                    <button type="submit" class="btn btn-dark" name="login" value="Entrar">Entrar</button>
                                    <a href="registrar.php" class="btn btn-outline-secondary"> Registrarse </a>
                                </div>

                            </div>

                        </form>
                        <?php
                        if (isset($error))
                            echo $error;
                        ?>
                    </div>
                </div>
</body>

</html>