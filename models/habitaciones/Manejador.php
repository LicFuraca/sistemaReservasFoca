<?php

require_once __DIR__ . '/../db/Db.php';


class ManejadorHabitacion {

    private $db;

    public function __construct() {
        $this->db = new Db();
    }


    public function obtenerHabitaciones() {
        $query = 'SELECT * FROM habitaciones';
        $resultado = $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $habitaciones = array();
        foreach ($resultado as $unaFila) {
            $habitacion = new Habitacion($unaFila);
            $habitaciones[] = $habitacion;
        }

        return $habitaciones;
    }


    public function obtenerTiposHabitaciones() {
        $query = 'SELECT * FROM TiposHabitaciones';

        $habitaciones = $this->db->query($query);

        return $habitaciones;
    }
}
