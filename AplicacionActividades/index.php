<?php require "controladores/controladorActividad.php";
      require "controladores/controladorUsuarios.php";
      require "usuario.php";
?>

<?php

session_start();
comprobarLogin();
comprobarActividad();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Actividad</title>
    <link rel="stylesheet" href="style.css" type="text/css">

</head>

<body>
    <nav class="nav justify-content-end">
        <a class="nav-link disabled fs-5" href="#" tabindex="-1" aria-disabled="true"><?php echo $_SESSION["usuario"]->nombre ?></a>
        <a class="nav-link active fs-5" href="logout.php"> Salir</a>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <?php
                $actividades = listarActividades();
                foreach ($actividades as $actividad) :
                ?>
                    <div class="card col-10 border-dark mb-3">
                        <div class="imagenes">
                            <?php if ($actividad->tipo !== "") : ?>
                                <img class="img-fluid" src="./Imagenes/<?php echo $actividad->tipo ?>.jpg">
                            <?php endif ?>
                        </div>
                        <div class="lista">
                            <ul class="list-group">
                                <li class="list-group-item">Titulo: <?php echo $actividad->titulo ?></li>
                                <li class="list-group-item">Ciudad: <?php echo $actividad->ciudad ?></li>
                                <li class="list-group-item">Fecha: <?php echo $actividad->fecha ?></li>
                                <li class="list-group-item">Precio: <?php echo $actividad->precio ?></li>
                                <li class="list-group-item">Creador: <?php echo $actividad-> usuario ?></li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-6 justify-content-center">
                <div class="card col-10 border-dark mb-3 justify-content-center">
                    <?php include "formulario.html" ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>