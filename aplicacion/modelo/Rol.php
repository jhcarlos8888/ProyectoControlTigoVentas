<?php

namespace aplicacion\modelo\Rol;

use Conexion;
use PDO;

class Rol
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


    public static function ListarRoles()
    {
        $roles = array();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT id,nombre_rol as nombre FROM rol");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {
            $rol = new Rol();
            $rol->setId($fila->id);
            $rol->setNombre($fila->nombre);
            $roles[] = $rol;
        }
        $conexionDataBase->CerrarConexion();
        return $roles;
    }

    public static function consultarRol($id)
    {
        $rol = new Rol();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT nombre_rol as nombre FROM rol where id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $fila = $stmt->fetch();
            $rol->setId($id);
            $rol->setNombre($fila->nombre);
        }
        $conexionDataBase->CerrarConexion();
        return $rol;
    }
}