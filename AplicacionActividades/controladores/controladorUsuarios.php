<?php 

function comprobarLogin(){
    if (!isset($_SESSION["usuario"]) && isset($_COOKIE["cookie_usuario"])) {
        $_SESSION["usuario"] = obtenerUsuarioPorId($_COOKIE["cookie_usuario"]);
    }
    
    if (!isset($_SESSION["usuario"])) {
    
        header("Location: login.php");
        exit();
    }
}

function obtenerUsuario($nombreUsuario, $contraseña){

   global $conexion;
   $consulta = "SELECT Id, Nombre, Correo FROM usuarios
                WHERE Nombre = ? AND Contraseña = ?";

    $stmt = $conexion ->prepare($consulta);
    $stmt -> bind_param('ss', $nombreUsuario, $contraseña);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if($resultado){

        $usuario_db = mysqli_fetch_assoc($resultado);

        if($usuario_db){
            $usuario = new Usuario(
                $usuario_db["Id"],
                $usuario_db["Nombre"],
                $usuario_db["Correo"],
                $usuario_db["Contraseña"]);

                return $usuario;

        }
     

    }

 
}

function obtenerUsuarioPorId($id){

    global $conexion;
    $consulta = "SELECT Id, Nombre, Correo FROM usuarios WHERE Id = '$id'";
 
     $stmt = $conexion -> prepare($consulta);
     $stmt -> bind_param('s', $id);
     $stmt->execute();
     $resultado = $stmt->get_result();
 
     if($resultado){
 
         $usuario_db = mysqli_fetch_assoc($resultado);
         if($usuario_db){
            $usuario = new Usuario(
                $usuario_db["Id"],
                $usuario_db["Nombre"],
                $usuario_db["Correo"],
                $usuario_db["Contraseña"]);

                return $usuario;
     }
 
 
 }
}

function hacerLogin($usuario){
    
    $_SESSION["usuario"] = $usuario;
    setcookie('cookie_usuario', $usuario->id, time() + 3600, '/');

    header("Location: index.php");
    exit();    
}

function registrarUsuario(){
    if (
        isset($_POST["registrarUsuario"])    ) {
        $usuario = new Usuario(
            $_POST["Usuario"],
            $_POST["Nombre"],
            $_POST["exampleInputEmail1"],
            $_POST["Contraseña"]);

      
    
        crearUsuario($usuario);
    }

}
function crearUsuario($usuario){
    global $conexion;
        $consulta  = "INSERT INTO usuarios (Id, Correo, Nombre, Contraseña )
                    VALUES(?, ?, ?, ?)";
                    $stmt = $conexion ->prepare($consulta);
                    $stmt->bind_param('ssss',
                                                                          
                                       $usuario->id,
                                       $usuario->correo,
                                       $usuario->nombre,
                                       $usuario->contraseña);
    
        $stmt->execute();

}
   
?>
