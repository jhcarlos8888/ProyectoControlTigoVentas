<?php

namespace ControlVentas;

use aplicacion\modelo\Estado\Estado;
use Conexion;
use Exception;
use PDO;
use servicio\Servicio;

class ControlVentas
{

    private $id_ventas;
    private $oferta;
    private $asesor;
    private $cliente;
    private $servicio;
    private $estado;
    private $fecha;
    private $numero_orden_instalacion;

    public function getIdVentas()
    {
        return $this->id_ventas;
    }

    public function setIdVentas($id_ventas): void
    {
        $this->id_ventas = $id_ventas;
    }

    public function getOferta()
    {
        return $this->oferta;
    }

    public function setOferta($oferta): void
    {
        $this->oferta = $oferta;
    }

    public function getAsesor()
    {
        return $this->asesor;
    }

    public function setAsesor($asesor): void
    {
        $this->asesor = $asesor;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getServicio()
    {
        return $this->servicio;
    }

    public function setServicio($servicio): void
    {
        $this->servicio = $servicio;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    public function getNumeroOrdenInstalacion()
    {
        return $this->numero_orden_instalacion;
    }

    public function setNumeroOrdenInstalacion($numero_orden_instalacion): void
    {
        $this->numero_orden_instalacion = $numero_orden_instalacion;
    }

    public function listar()
    {
        try {
            $result = array();

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("SELECT * FROM control_ventas");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {

                $cvtas = new ControlVentas();

                $cvtas->setIdVentas($r->id);
                $cvtas->setOferta($r->oferta);
                $cvtas->setAsesor($r->asesor);
                $cvtas->setCliente($r->cliente);
                $cvtas->setServicio($r->servicio);
                $cvtas->setEstado($r->estado);
                $cvtas->setFecha($r->fecha);
                $cvtas->setNumeroOrdenInstalacion($r->numero_orden_instalacion);

                $result[] = $cvtas;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("SELECT * FROM control_ventas WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $cvtas = new ControlVentas();

            $cvtas->setIdVentas($r->id);
            $cvtas->setOferta($r->oferta);
            $cvtas->setAsesor($r->asesor);
            $cvtas->setCliente($r->cliente);
            $cvtas->setServicio($r->servicio);
            $cvtas->setEstado($r->estado);
            $cvtas->setFecha($r->fecha);
            $cvtas->setNumeroOrdenInstalacion($r->numero_orden_instalacion);

            return $cvtas;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("DELETE FROM control_ventas WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar()
    {
        try {
            $sql = "UPDATE control_ventas 
                    SET oferta=?, fk_usuario=?, fk_cliente=?, fk_servicio=?, fk_estado=?,fecha=?, numero_instalacion=?
                    WHERE id = ?";

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare($sql);
            $stm->execute(array(
                $this->getOferta(),
                $this->getAsesor(),
                $this->getCliente(),
                $this->getServicio(),
                $this->getEstado(),
                $this->getFecha(),
                $this->getNumeroOrdenInstalacion()
            ));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Registrar()
    {
        try {
            $sql = "INSERT INTO control_ventas (oferta, fk_usuario, fk_cliente, fk_servicio,fk_estado,fecha,numero_instalacion)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare($sql);
            $resultado = $stm->execute(array(
                $this->getOferta(),
                $this->getAsesor(),
                $this->getCliente(),
                $this->getServicio(),
                $this->getEstado(),
                $this->getFecha(),
                $this->getNumeroOrdenInstalacion()
            ));

            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarControlVentasDelCliente($id)
    {
        $ListaSeguimiento = array();
        try {
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("SELECT control_ventas.id, servicios.id_servicios, servicios.tipo_servicio AS servicio, fk_estado, control_ventas.fecha 
                           FROM control_ventas
                           INNER JOIN servicios ON control_ventas.fk_servicio = servicios.id_servicios
                           WHERE control_ventas.fk_cliente = ?");
            $stm->setFetchMode(PDO::FETCH_OBJ);
            $stm->execute(array($id));

            while ($seguimiento = $stm->fetch()) {

                $control = new ControlVentas();

                $control->setIdVentas($seguimiento->id);

                $ser = new Servicio($seguimiento->id_servicios, $seguimiento->servicio);
                $nuevoEstado = (new Estado)->consultarEstado($seguimiento->fk_estado);
                $control->setServicio($ser);
                $control->setEstado($nuevoEstado);
                $control->setFecha($seguimiento->fecha);
                $ListaSeguimiento[] = $control;

            }

            return $ListaSeguimiento;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
