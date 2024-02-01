<?php

class AuthController {


    public static function iniciarSesion($idCliente) {
        if (session_status() == PHP_SESSION_NONE) session_start();

        $_SESSION['idCliente'] = $idCliente;
    }


    public static function cerrarSesion() {
        // Chequeo que exista una sesión sino la inicio para que no de error.
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();
    }


    public static function usuarioLogueado() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica si el usuario está autenticado
        if (isset($_SESSION['idCliente'])) {
            return $_SESSION['idCliente'];
        } else {
            return false;
        }
    }
}
