<?php

try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conexion = mysqli_connect('localhost', 'root', 'root', 'ifpdb');
} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());
    die("Error en la conexion");
} ?>
<?php require "actividad.php";

function comprobarActividad()
{

    comprobarLogin();
    if (!isset($_SESSION["listado_actividades"])) {

        $_SESSION["listado_actividades"] = array();
    }
    if (
        isset($_POST["crearActividad"])
    ) {
        $actividad = new Actividad(
            $_POST["titulo"],
            $_POST["tipo"],
            $_POST["fecha"],
            $_POST["ciudad"],
            $_POST["precio"],
            $_SESSION["usuario"]->id
        );

        array_push($_SESSION["listado_actividades"], serialize($actividad));
        crearActividad($actividad);
    }
}

function crearActividad($actividad)
{

    $endpoint = 'http://' . $_SERVER['HTTP_HOST'] . "/Servidor/UF4_API_REST_PHP/index.php";
    $json = json_encode($actividad);
    $curl = curl_init();   // Inicia sesión cURL

    curl_setopt($curl, CURLOPT_URL, $endpoint); //Dirección URL a capturar
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // true para devolver el resultado de la transferencia como string del valor de curl_exec() en lugar de mostrarlo directamente.
    curl_setopt($curl, CURLOPT_POST, 1); //true para hacer un HTTP POST normal. 
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json); //Todos los datos para enviar vía HTTP "POST"

    curl_exec($curl); //Establece una sesión cURL
    curl_close($curl);
}

function listarActividades()
{

    $endpoint = 'http://' . $_SERVER['HTTP_HOST'] . "/Servidor/UF4_API_REST_PHP/index.php"; //definir a donde vamos a conectar
    $curl = curl_init(); //para hacer peticones http
    curl_setopt($curl, CURLOPT_URL, $endpoint);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl); //ejecutar peticon
    curl_close($curl);
    $listado = json_decode($output, true);
    /*
    switch(json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - Sin errores';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Excedido tamaño máximo de la pila';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Desbordamiento de buffer o los modos no coinciden';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Encontrado carácter de control no esperado';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Error de sintaxis, JSON mal formado';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Caracteres UTF-8 malformados, posiblemente codificados de forma incorrecta';
        break;
        default:
            echo ' - Error desconocido';
        break;
    }*/

    $actividades  = array();

    foreach ($listado as $fila) {

        $actividad = new Actividad(
            $fila["Titulo"],
            $fila["Tipo"],
            $fila["Fecha"],
            $fila["Ciudad"],
            $fila["Precio"],
            $fila["Usuario"]
        );

        array_push($actividades, $actividad);
    }
    return $actividades;
}

?>