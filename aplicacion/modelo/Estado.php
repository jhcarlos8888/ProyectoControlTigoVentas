<?php

namespace aplicacion\modelo\Estado;

use Conexion;
use PDO;

class Estado
{
    private $id;
    private $estado;

    function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function consultarEstado($id){
        $estado = new Estado();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT tipo_estado as estado FROM estado where id_estado=:id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $fila = $stmt->fetch();
            $estado->setId($id);
            $estado->setEstado($fila->estado);
        }
        $conexionDataBase->CerrarConexion();
        return $estado;
    }

    public function listarEstados(){
        $estados = array();
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT id_estado as id, tipo_estado as nombre FROM estado");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {
            $estado = new Estado();
            $estado->setId($fila->id);
            $estado->setEstado($fila->nombre);
            $estados[] = $estado;
        }
        $conexionDataBase->CerrarConexion();
        return $estados;
    }
}