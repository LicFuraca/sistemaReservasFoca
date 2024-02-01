<?php

require_once __DIR__ . '/../../config/config.php';

class Db {
    private $host;
    private $db;
    private $usuario;
    private $pass;
    public $conexion;


    public function __construct() {
        $this->host = constant('DB_HOST');
        $this->db = constant('DB_NAME');
        $this->usuario = constant('DB_USER');
        $this->pass = constant('DB_PASS');

        try {
            $this->conexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->usuario, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Conexión fallida: ' . $e->getMessage());
        }
    }


    public function getConexion() {
        return $this->conexion;
    }


    public function query($query, $params = []) {

        try {

            $statement = $this->conexion->prepare($query);

            foreach ($params as $key => &$param) {
                $statement->bindParam($key, $param);
            }

            $statement->execute();
        } catch (Exception $e) {
            print_r('Error al ejecutar la consulta a la base de datos ' . $e);
        }

        return $statement;
    }
}
