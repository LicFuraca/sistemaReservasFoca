<?php

require_once __DIR__ . '/../../models/habitaciones/Manejador.php';

$manejador = new ManejadorHabitacion();
$habitaciones = $manejador->obtenerTiposHabitaciones();

require_once __DIR__ . '/../../views/habitaciones/index.php';
