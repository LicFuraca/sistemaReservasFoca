<?php

require_once __DIR__ . '/../../models/user/Manejador.php';
require_once __DIR__ . '/AuthController.php';

$idCliente = AuthController::usuarioLogueado();
$manejador = new Manejador();
global $mjeRegistro;

if ($idCliente) header('Location: /');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['pass'];
    $camposValidos = array();
    $formularioValido = true;

    require_once __DIR__ . '/../../utils/Validaciones.php';
    $validaciones = new Validaciones();
    $camposValidos['nombre'] = $validaciones->validarCampo($nombre);
    $camposValidos['email'] = $validaciones->validarEmail($email);
    $camposValidos['contrasena'] = $validaciones->validarContrasena($contrasena);

    enviarDatosParaRegistro($nombre, $email, $contrasena);
}

require_once __DIR__ . '/../../views/user/registro.php';

function enviarDatosParaRegistro($nombre, $email, $contrasena): void {
    global $mjeRegistro;
    $hashContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    $manejador = new Manejador();
    $resultado = $manejador->registrarUsuario($nombre, $email, $hashContrasena);

    if (is_string($resultado)) {
        $mjeRegistro = $resultado;
    } else {
        AuthController::iniciarSesion($resultado->id);
        $mjeRegistro = null;

        header('Location: /');
        exit();
    }
}
