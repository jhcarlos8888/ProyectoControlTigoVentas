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

    public function listar()
    {
        try {

            $result = array();

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("SELECT * FROM servicios");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $ser = new servicio($r->id, $r->tipo_servicio);

                $result[] = $ser;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function Obtener($id)
    {
        try {

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("SELECT * FROM servicios WHERE id_servicios = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            return new servicio($r->id, $r->tipo_servicio);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("DELETE FROM servicios WHERE id_servicios = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(servicio $data)
    {
        try {
            $sql = "UPDATE servicios SET tipo_servicio = ? WHERE id_servicios = ?";

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare($sql);
            $stm->execute(array($data->getTipoServicio(), $data->getIdServicio()));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(servicio $data)
    {
        try {
            $sql = "INSERT INTO servicios (id_servicios, tipo_servicio)
                VALUES (?, ?)";

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare($sql);
            $stm->execute(array($data->getIdServicio(), $data->getTipoServicio()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
