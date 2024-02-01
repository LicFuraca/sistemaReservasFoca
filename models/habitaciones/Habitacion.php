<?php

class Habitacion {
    public $id;
    public $categoria;
    public $capacidad;
    public $numero;
    public $servicios;
    public $precio;

    public function __construct($datos) {
        $this->id = $datos['id'];
        $this->categoria = $datos['categoria'];
        $this->capacidad = $datos['capacidad'];
        $this->numero = $datos['numero'];
        $this->servicios = $datos['servicios'];
        $this->precio = $datos['precio'];
    }
}
