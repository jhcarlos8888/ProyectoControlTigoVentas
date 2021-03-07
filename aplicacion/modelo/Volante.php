<?php


namespace aplicacion\modelo;


use Conexion;
use PDO;

class Volante
{

    private $id;
    private $nombre;
    private $ruta;

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    public function setId($id)
    {
        $this->nombre = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
    }

    public function subirVolante()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();

        $stmt = $conexion->prepare("INSERT INTO volante (nombre, ruta) VALUES (:nombre,:ruta)");

        $stmt->bindValue(":nombre", $this->nombre);
        $stmt->bindValue(":ruta", $this->ruta);
        return $stmt->execute();
    }

    public function listarManuales()
    {
        $listaDeVolantes = array();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT * FROM volante");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {

            $nuevoVolante = new Volante();

            $nuevoVolante->setId($fila->id);
            $nuevoVolante->setNombre($fila->nombre);
            $nuevoVolante->setRuta($fila->ruta);

            $listaDeVolantes[] = $nuevoVolante;
        }
        $conexionDataBase->CerrarConexion();
        return $listaDeVolantes;
    }
}