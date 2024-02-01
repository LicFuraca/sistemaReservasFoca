<?php

require_once __DIR__ . '/../../models/reservas/Manejador.php';
require_once __DIR__ . '/../user/AuthController.php';

$manejador = new ManejadorReserva();
$mensajeAlUsuario = '';
$mensajeFormulario = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCliente = AuthController::usuarioLogueado();

    if (!$idCliente) header('Location: /login');

    $camposValidos = array();
    $formularioValido = true;

    require_once __DIR__ . '/../../utils/Validaciones.php';
    $validaciones = new Validaciones();

    $camposValidos['habitacion'] = $validaciones->validarSelect($_POST['habitacion']);
    $camposValidos['desde'] = $validaciones->validarFechaDesde($_POST['desde']);
    $camposValidos['hasta'] = $validaciones->validarFechaHasta($_POST['desde'], $_POST['hasta']);


    foreach ($camposValidos as $clave => $valor) {
        if (is_string($valor)) {
            $mensajeFormulario = $valor;
            $formularioValido = false;
            break;

            header("Location: /crear-reserva");
        }
    }

    $checkIn = $_POST['desde'];
    $checkOut = $_POST['hasta'];
    $idHabitacion = $_POST['habitacion'];

    if ($formularioValido) {
        $mensajeAlUsuario = $manejador->guardarReserva($checkIn, $checkOut, $idHabitacion, $idCliente);
    }
}

require_once __DIR__ . '/../../views/reservas/crearReserva.php';
