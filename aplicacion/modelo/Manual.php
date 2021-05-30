<?php

namespace manual;

use Conexion;
use PDO;

class Manual
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

    public function listarManuales()
    {
        $listaDeManuales = array();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT * FROM manual");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {

            $nuevoManual = new Manual();

            $nuevoManual->setId($fila->id);
            $nuevoManual->setNombre($fila->nombre);
            $nuevoManual->setRuta($fila->ruta);

            $listaDeManuales[] = $nuevoManual;
        }
        $conexionDataBase->CerrarConexion();
        return $listaDeManuales;
    }

    public function subirManual()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();

        $stmt = $conexion->prepare("INSERT INTO manual (nombre, ruta) VALUES (:nombre,:ruta)");

        $stmt->bindValue(":nombre", $this->nombre);
        $stmt->bindValue(":ruta", $this->ruta);
        $resultado = $stmt->execute();
        $conexionDataBase->CerrarConexion();
        return $resultado;

    }
}