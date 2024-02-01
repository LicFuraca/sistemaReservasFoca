<?php

class Validaciones {

    public static function validarCampo($campo) {
        if (empty($campo)) {
            return "El campo no puede estar vacío";
        }

        return true;
    }

    public static function validarEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Formato de email inválido";
        }

        return true;
    }

    public static function validarContrasena($contrasena) {
        if (strlen($contrasena) < 4) {
            return "La contraseña debe tener al menos 4 caracteres";
        }

        return true;
    }

    public static function validarFechaDesde($fechaDesde) {
        $fechaDesde = new DateTime($fechaDesde);
        $fechaActual = new DateTime();

        if ($fechaDesde < $fechaActual) {
            return "La fecha desde no puede ser menor a la fecha actual";
        }

        return true;
    }

    public static function validarFechaHasta($fechaDesde, $fechaHasta) {
        $fechaDesde = new DateTime($fechaDesde);
        $fechaHasta = new DateTime($fechaHasta);

        if ($fechaHasta < $fechaDesde) {
            return "La fecha hasta no puede ser menor a la fecha desde";
        }

        return true;
    }

    public static function validarSelect($valor) {
        if (!is_numeric($valor)) {
            return "Debe seleccionarse un tipo de habitación.";
        }

        return true;
    }
}
