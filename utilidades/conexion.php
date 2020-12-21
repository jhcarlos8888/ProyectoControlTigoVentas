<?php

require "../configuracion/configuracion.php";

class Conexion
{
    private $hostname, $username, $password, $dbname, $con;

    public function __construct()
    {
        $this->hostname = HOST;
        $this->username = USER;
        $this->password = PASSWORD;
        $this->dbname = DATABASE;
    }

    public function CrearConexion()
    {
        try {
            $this->con = mysqli_connect($this->hostname, $this->username,
                $this->password) or die("Connection failed: " . mysqli_connect_error());
            mysqli_select_db($this->con, $this->dbname) or die('No se pudo seleccionar la base de utilidades');

        }catch (Exception $e){
            echo "Error de conexion " .$e->getMessage();
        }
    }

    public function CerrarConexion()
    {
        $this->con->close();
    }

    public function getCon()
    {
        return $this->con;
    }
}