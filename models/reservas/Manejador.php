<?php

require_once __DIR__ . '/../db/Db.php';
require_once __DIR__ . '/Reserva.php';

class ManejadorReserva {
    private $db;


    public function __construct() {
        $this->db = new Db();
    }


    public function guardarReserva($checkIn, $checkOut, $idHabitacion, $idCliente) {

        $estaDisponible = $this->chequearDisponibilidad($checkIn, $checkOut, $idHabitacion);

        if ($estaDisponible) {
            $query = 'INSERT INTO reservas(user_id, desde, hasta, habitacion_id)
                VALUES(:user_id, :desde, :hasta, :habitacion_id)';

            $options = [
                'user_id' => $idCliente,
                'desde' => $checkIn,
                'hasta' => $checkOut,
                'habitacion_id' => $idHabitacion
            ];

            $this->db->query($query, $options);

            return 'La reserva fue generada con éxito.';
        } else {
            return 'La habitación no está disponible en esas fechas. Elija otras fechas u otra habitación.';
        }
    }


    private function obtenerReservasHabitacion($idHabitacion) {
        $query = 'SELECT * FROM reservas WHERE habitacion_id = :habitacion_id;';
        $options = ['habitacion_id' => $idHabitacion];
        $resultado = $this->db->query($query, $options)->fetchAll(PDO::FETCH_ASSOC);

        $reservas = Reserva::crearReservas($resultado);

        return $reservas;
    }


    public function obtenerReservasUsuario($idCliente) {
        $query = 'SELECT reservas.*, habitaciones.categoria AS nombreHabitacion
            FROM reservas
            JOIN habitaciones ON reservas.habitacion_id = habitaciones.id
            WHERE reservas.user_id = :user_id
            ORDER BY desde ASC';
        $options = ['user_id' => $idCliente];
        $resultado = $this->db->query($query, $options)->fetchAll(PDO::FETCH_ASSOC);

        if (empty($resultado)) {
            return array();
        }

        $reservas = Reserva::crearReservas($resultado);

        return $reservas;
    }


    private function chequearDisponibilidad($checkIn, $checkOut, $idHabitacion) {

        $reservasDB = $this->obtenerReservasHabitacion($idHabitacion);

        $checkIn = new DateTime($checkIn);
        $checkOut = new DateTime($checkOut);
        $estaDisponible = true;

        foreach ($reservasDB as $datosReserva) {
            $reserva = $datosReserva;

            if ($reserva->idHabitacion == $idHabitacion) {

                $dbCheckIn = new DateTime($reserva->desde);
                $dbCheckOut = new DateTime($reserva->hasta);

                // ¿la habitacíon tiene reservas para esas fechas?
                if ($checkOut >= $dbCheckIn && $dbCheckOut >= $checkIn) {
                    $estaDisponible = false;
                    break;
                }
            }
        }

        return $estaDisponible;
    }
}
