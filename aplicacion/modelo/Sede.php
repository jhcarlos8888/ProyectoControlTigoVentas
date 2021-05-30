<?php

namespace aplicacion\modelo\Sede;

use Conexion;
use PDO;

class Sede
{
    private $id;
    private $nombre;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public static function ListarSedes()
    {
        $sedes = array();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT id,nombre_sede as nombre FROM zona_sede");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {
            $sede = new Sede();
            $sede->setId($fila->id);
            $sede->setNombre($fila->nombre);
            $sedes[] = $sede;
        }
        $conexionDataBase->CerrarConexion();
        return $sedes;
    }

    public static function consultarSede($id){
        $sede = new Sede();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT nombre_sede as nombre FROM zona_sede where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $fila = $stmt->fetch();
            $sede->setId($id);
            $sede->setNombre($fila->nombre);
        }
        $conexionDataBase->CerrarConexion();
        return $sede;
    }
}