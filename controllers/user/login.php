<?php

require_once __DIR__ . '/../../models/user/Manejador.php';
require_once __DIR__ . '/AuthController.php';

$idCliente = AuthController::usuarioLogueado();
if ($idCliente) header('Location: /');

$mensajeFormulario = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $camposValidos = array();
    $formularioValido = true;
    $email = $_POST['email'];
    $contrasena = $_POST['pass'];

    require_once __DIR__ . '/../../utils/Validaciones.php';
    $validaciones = new Validaciones();
    $camposValidos['email'] = $validaciones->validarEmail($email);
    $camposValidos['contrasena'] = $validaciones->validarContrasena($contrasena);

    foreach ($camposValidos as $clave => $valor) {
        if (is_string($valor)) {
            $mensajeFormulario = $valor;
            $formularioValido = false;
            break;
        }
    }

    if ($formularioValido) {
        $mensajeLogin = login($email, $contrasena);
    }
}

require_once __DIR__ . '/../../views/user/login.php';

function login($email, $contrasena) {
    $manejador = new Manejador();
    $usuario = $manejador->validarUsuario($email, $contrasena);

    if ($usuario != null) {
        AuthController::iniciarSesion($usuario->id);

        header('Location: /');
        exit();
    } else {
        return 'Usuario o contraseña incorrectos. Vuelva a intentarlo.';
    }
}
