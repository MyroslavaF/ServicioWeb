<?php

require "db.php";


function crearActividad(){

    $actividad = json_decode(file_get_contents('php://input'), true);

    
    global $conexion;

    $consulta  = "INSERT INTO actividades (Titulo, Ciudad, Fecha, Precio, Usuario, Tipo)
                VALUES(?, ?, ?, ?, ?, ?)";
                $stmt = $conexion ->prepare($consulta);
                $stmt->bind_param('ssssss',
                                                                      
                                   $actividad["titulo"],
                                   $actividad["ciudad"],
                                   $actividad["fecha"],
                                   $actividad["precio"],
                                   $actividad["usuario"],
                                   $actividad["tipo"]
                                                            
                                );                               

                $resultado = $stmt->execute();
                if($resultado){
                   
                    header("HTTP/1.1 200 OK");
                    
                }else{
                    header("HTTP/1.1 500 Internal Server Error");
                }
    
}

function listarActividades(){

    global $conexion;
    $actividades = array();
    $consulta = "SELECT * FROM actividades";
    $resultado = mysqli_query($conexion, $consulta);

    if($resultado){
        while($fila = mysqli_fetch_assoc($resultado)){

            array_push($actividades, $fila);

        }
        header("HTTP/1.1 200 OK");
        echo json_encode($actividades); // funccion transfroma los datos a json 
    }else{
        header("HTTP/1.1 500 Internal Server Error");
    }

return $actividades;

}

function eliminarActividad(){

    $id = $_GET["Id"];
    global $conexion;
    $consulta  = "DELETE FROM actividades WHERE Id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param('d', $id);

    $resultado = $stmt->execute();
                if($resultado){
                   
                    header("HTTP/1.1 200 OK");
                    
                }else{
                    header("HTTP/1.1 500 Internal Server Error");
                }

}

function modificarElemento(){

    $actividad = json_decode(file_get_contents('php://input'), true);

    $id = $_GET["id"];
    global $conexion;

    $consulta  = "UPDATE actividades SET Titulo = ?, Ciudad = ?, Fecha = ?, Precio = ?,
                                         Usuario = ?, Tipo = ?
                 WHERE id = ?";
    
    $stmt = $conexion ->prepare($consulta);
    $stmt->bind_param('ssssssd',
                                                          
                       $actividad["Titulo"],
                       $actividad["Ciudad"],
                       $actividad["Fecha"],
                       $actividad["Precio"],
                       $actividad["Usuario"],
                       $actividad["Tipo"],
                       $id
                    );

    $resultado = $stmt->execute();
    if($resultado){
       
        header("HTTP/1.1 200 OK");
        
    }else{
        header("HTTP/1.1 500 Internal Server Error");
    }

    


}

?>