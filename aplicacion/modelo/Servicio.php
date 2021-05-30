<?php

namespace servicio;

use Conexion;
use Exception;
use PDO;

class Servicio
{
    private $id_servicio;
    private $tipo_servicio;


    public function __construct($id_servicio, $tipo_servicio)
    {
        $this->id_servicio = $id_servicio;
        $this->tipo_servicio = $tipo_servicio;
    }

    public function getIdServicio()
    {
        return $this->id_servicio;
    }

    public function setIdServicio($id_servicio): void
    {
        $this->id_servicio = $id_servicio;
    }

    public function getTipoServicio()
    {
        return $this->tipo_servicio;
    }

    public function setTipoServicio($tipo_servicio): void
    {
        $this->tipo_servicio = $tipo_servicio;
    }

    public static function listar()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $result = array();
            $stm = $conexion->prepare("SELECT * FROM servicios");
            $stm->setFetchMode(PDO::FETCH_OBJ);
            $stm->execute();

            while ($r = $stm->fetch() ){
                $ser = new servicio($r->id_servicios, $r->tipo_servicio);
                $result[] = $ser;
            }
            $conexionDataBase->CerrarConexion();
            return $result;
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public static function Obtener($id)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $stm = $conexion->prepare("SELECT * FROM servicios WHERE id_servicios = ?");
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $conexionDataBase->CerrarConexion();
            return new servicio($r->id, $r->tipo_servicio);

        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $stm = $conexion->prepare("DELETE FROM servicios WHERE id_servicios = ?");
            $conexionDataBase->CerrarConexion();
            $stm->execute(array($id));
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Actualizar(servicio $data)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $sql = "UPDATE servicios SET tipo_servicio = ? WHERE id_servicios = ?";
            $stm = $conexion->prepare($sql);
            $stm->execute(array($data->getTipoServicio(), $data->getIdServicio()));
            $conexionDataBase->CerrarConexion();
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Registrar(servicio $data)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $sql = "INSERT INTO servicios (id_servicios, tipo_servicio)
                VALUES (?, ?)";
            $stm = $conexion->prepare($sql);
            $stm->execute(array($data->getIdServicio(), $data->getTipoServicio()));
            $conexionDataBase->CerrarConexion();
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }
}
