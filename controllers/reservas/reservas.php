<?php

require_once __DIR__ . '/../../models/reservas/Manejador.php';
require_once __DIR__ . '/../user/AuthController.php';

$idCliente = AuthController::usuarioLogueado();

if (!$idCliente) header('Location: /login');

$manejador = new ManejadorReserva();
$reservas = $manejador->obtenerReservasUsuario($idCliente);

require_once __DIR__ . '/../../views/reservas/index.php';
