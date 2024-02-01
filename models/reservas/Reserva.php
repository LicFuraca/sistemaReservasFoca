<?php

class Reserva {
    public $id;
    public $idCliente;
    public $desde;
    public $hasta;
    public $idHabitacion;
    public $nombreHabitacion;


    public function __construct($datos) {
        $this->id = $datos['id'];
        $this->idCliente = $datos['user_id'];
        $this->desde = $datos['desde'];
        $this->hasta = $datos['hasta'];
        $this->idHabitacion = $datos['habitacion_id'];
        $this->nombreHabitacion = isset($datos['nombreHabitacion'])
            ? $datos['nombreHabitacion']
            : null;
    }


    public static function crearReservas($datos) {

        // Chequeo si $datos es un array de arrays.
        if (is_array(reset($datos))) {
            $reservas = array();

            foreach ($datos as $unaFila) {
                $reserva = new Reserva($unaFila);
                $reservas[] = $reserva;
            }

            return $reservas;
        } else {
            return new Reserva($datos);
        }
    }
}
