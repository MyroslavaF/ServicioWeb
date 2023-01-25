<?php

class Actividad {
    public $titulo;
    public $tipo;
    public $fecha;
    public $ciudad;
    public $precio;
    public $usuario;

function __construct ($titulo, $tipo, $fecha, $ciudad, $precio, $usuario) {

    $this->titulo = $titulo;
    $this->tipo = $tipo;
    $this->fecha = $fecha;
    $this->ciudad = $ciudad;
    $this->precio = $precio;
    $this->usuario = $usuario;

}

}

?>