<?php

require_once __DIR__ . '/../db/Db.php';
require_once __DIR__ . '/Usuario.php';


class Manejador {
    private $db;


    public function __construct() {
        $this->db = new Db();
    }


    private function obtenerUsuarioPorEmail($email) {
        $query = 'SELECT * FROM users WHERE email = :email;';
        $options = ['email' => $email];

        return $this->db->query($query, $options);
    }


    public function validarUsuario($email, $contrasena) {
        $usuario = $this->obtenerUsuarioPorEmail($email)->fetch();

        if ($usuario && password_verify($contrasena, $usuario['password'])) {
            $usuarioObj = new Usuario($usuario['id']);
            $usuarioObj->setNombre($usuario['nombre']);
            $usuarioObj->setEmail($usuario['email']);

            return $usuarioObj;
        } else {
            return null;
        }
    }


    private function emailExiste($email) {
        $query = 'SELECT * FROM users WHERE email = :email LIMIT 1';
        $options = ['email' => $email];
        $resultado = $this->db->query($query, $options)->fetch();

        return $resultado ? true : false;
    }


    public function registrarUsuario($nombre, $email, $contrasena) {

        // Chequear que el email no esté registrado previamente.
        $usuario = $this->emailExiste($email);

        if ($usuario) {
            return 'El email ya está registrado';
        } else {
            $query = 'INSERT INTO users (nombre, email, password) 
            VALUES (:nombre, :email, :password);';

            $options = [
                'nombre' => $nombre,
                'email' => $email,
                'password' => $contrasena
            ];

            try {
                $this->db->query($query, $options);
                $usuario = $this->obtenerUsuarioPorEmail($email)->fetch();

                $usuarioObj = new Usuario($usuario['id']);
                $usuarioObj->setNombre($usuario['nombre']);
                $usuarioObj->setEmail($usuario['email']);

                return $usuarioObj;
            } catch (Exception) {

                return 'Error en el registro de usuario.';
            }
        }
    }
}
