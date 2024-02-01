<?php

class Usuario {
    public $id;
    private $nombre;
    private $email;
    private $contrasena;


    public function __construct($id) {
        $this->id = $id;
    }


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }


    public function setEmail($email) {
        $this->email = $email;
    }


    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
}
