<?php

class Conexion
{
    private $hostname, $username, $password, $dbname, $con;

    public function __construct()
    {
        $this->hostname = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "ControlVentas";
    }

    public function CrearConexion()
    {
        try {
            $this->con = mysqli_connect($this->hostname, $this->username,
                $this->password) or die("Connection failed: " . mysqli_connect_error());
            mysqli_select_db($this->con, $this->dbname) or die('No se pudo seleccionar la base de datos');

            echo "Conexion Realizada exitosamente";
        }catch (Exception $e){
            echo "Error de conexion";
        }


    }

    public function CerrarConexion()
    {
        $this->con->close();
    }

}

$prueba = new Conexion();

$prueba->CrearConexion();
