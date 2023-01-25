<?php

try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conexion = mysqli_connect ('localhost', 'root', 'root', 'ifpdb');
}
catch (mysqli_sql_exception $e){
    error_log($e->getMessage());
    die("Error en la conexion");

}


//if ($conexion->connect_errno) {
 //   printf("Error de conexion", $connexion->connect_errno);
 //   exit();
//}



?>