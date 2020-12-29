<?php

class Conexion
{
    private $hostname, $username, $password, $dbname, $con, $dsn;

    public function __construct()
    {
        $this->hostname = HOST;
        $this->username = USER;
        $this->password = PASSWORD;
        $this->dbname = DATABASE;
        $this->dsn = "mysql:host=$this->hostname;dbname=$this->dbname";
    }

    public function CrearConexion()
    {
        try {
            return $this->con = new PDO ($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            die( "Error de conexion " . $e->getMessage());
        }
    }

    public function CerrarConexion()
    {
        $this->con = null;
    }
}