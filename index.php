<?php

require "controladorActividades.php";

$tipo_solicitud =  $_SERVER["REQUEST_METHOD"]; // la forma de identificar la peticion
 

switch($tipo_solicitud){
    
    case "GET":
        listarActividades();
        break;

    case "POST":
        crearActividad();
        break;

    case "DELETE":
        eliminarActividad();
        break;

    case "PUT":
        modificarElemento();
        break;
 }


?>