<?php

namespace ControlVentas;

use aplicacion\modelo\Estado\Estado;
use Cliente\Cliente;
use Conexion;
use Exception;
use PDO;
use servicio\Servicio;
use usuario\Usuario;

class ControlVentas
{

    private $id_ventas;
    private $oferta;
    private $usuario;
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

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
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
	        $ListaControlVentas= array();
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();
	        $stm = $conexion->prepare("SELECT control_ventas.id, control_ventas.oferta, control_ventas.fk_usuario as usuario, control_ventas.fk_cliente as cliente, servicios.id_servicios, servicios.tipo_servicio AS servicio, fk_estado as estado, control_ventas.fecha, control_ventas.numero_instalacion 
                           FROM control_ventas
                           INNER JOIN servicios ON control_ventas.fk_servicio = servicios.id_servicios");
	        $stm->setFetchMode(PDO::FETCH_OBJ);
            $stm->execute();
	        while ($control = $stm->fetch()) {
		        $controlVenta = new ControlVentas();
		        $controlVenta->setIdVentas($control->id);
		        $controlVenta->setOferta($control->oferta);
		        $nuevoUsuario = (new Usuario)->ConsultarUsuario($control->usuario);
		        $nuevoCliente = (new Cliente)->Obtener($control->cliente);
		        $nuevoServicio = new Servicio($control->id_servicios, $control->servicio);
		        $nuevoEstado = (new Estado)->consultarEstado($control->estado);
		        $controlVenta->setServicio($nuevoServicio);
		        $controlVenta->setUsuario($nuevoUsuario);
		        $controlVenta->setCliente($nuevoCliente);
		        $controlVenta->setEstado($nuevoEstado);
		        $controlVenta->setFecha($control->fecha);
		        $controlVenta->setNumeroOrdenInstalacion($control->numero_instalacion);
		        $ListaControlVentas[] = $controlVenta;
	        }
            return $ListaControlVentas;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();

            $stm = $conexion->prepare("SELECT control_ventas.id, control_ventas.oferta, control_ventas.fk_usuario as usuario, control_ventas.fk_cliente as cliente, servicios.id_servicios, servicios.tipo_servicio AS servicio, fk_estado as estado, control_ventas.fecha, control_ventas.numero_instalacion 
                           FROM control_ventas
                           INNER JOIN servicios ON control_ventas.fk_servicio = servicios.id_servicios
	        			   WHERE id = ?");

            $stm->execute(array($id));
	        $control = $stm->fetch(PDO::FETCH_OBJ);
	        $controlVenta = new ControlVentas();
	        $controlVenta->setIdVentas($control->id);
	        $controlVenta->setOferta($control->oferta);
	        $nuevoUsuario = (new Usuario)->ConsultarUsuario($control->usuario);
	        $nuevoCliente = (new Cliente)->Obtener($control->cliente);
	        $nuevoServicio = new Servicio($control->id_servicios, $control->servicio);
	        $nuevoEstado = (new Estado)->consultarEstado($control->estado);
	        $controlVenta->setServicio($nuevoServicio);
	        $controlVenta->setUsuario($nuevoUsuario);
	        $controlVenta->setCliente($nuevoCliente);
	        $controlVenta->setEstado($nuevoEstado);
	        $controlVenta->setFecha($control->fecha);
	        $controlVenta->setNumeroOrdenInstalacion($control->numero_instalacion);

            return $controlVenta;
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
                    SET oferta=?, fk_servicio=?, fk_estado=?, numero_instalacion=?
                    WHERE id=?";
            $conexionDataBase = new Conexion();
            $conexion = $conexionDataBase->CrearConexion();
            $stm = $conexion->prepare($sql);
            $stm->execute(array(
                $this->getOferta(),
                $this->getServicio(),
                $this->getEstado(),
                $this->getNumeroOrdenInstalacion(),
	            $this->getIdVentas()
            ));
            return TRUE;
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
                $this->getUsuario(),
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

	public function listarPorAsesor($idAsesor)
	{
		$listaControlVentas = array();
		try {
			$conexionDataBase = new Conexion();
			$conexion = $conexionDataBase->CrearConexion();
			$stm = $conexion->prepare("SELECT control_ventas.id, control_ventas.oferta, 
       												control_ventas.fk_usuario as usuario, control_ventas.fk_cliente as cliente, 
       												servicios.id_servicios, servicios.tipo_servicio AS servicio, fk_estado as estado, 
       												control_ventas.fecha, control_ventas.numero_instalacion 
                           					 FROM control_ventas
                           					 INNER JOIN servicios ON control_ventas.fk_servicio = servicios.id_servicios
                           					 WHERE control_ventas.fk_usuario = ?");
			$stm->setFetchMode(PDO::FETCH_OBJ);
			$stm->execute(array($idAsesor));
			while ($control = $stm->fetch()) {
				$controlVenta = new ControlVentas();
				$controlVenta->setIdVentas($control->id);
				$controlVenta->setOferta($control->oferta);
				$nuevoUsuario = (new Usuario)->ConsultarUsuario($control->usuario);
				$nuevoCliente = (new Cliente)->Obtener($control->cliente);
				$nuevoServicio = new Servicio($control->id_servicios, $control->servicio);
				$nuevoEstado = (new Estado)->consultarEstado($control->estado);
				$controlVenta->setServicio($nuevoServicio);
				$controlVenta->setUsuario($nuevoUsuario);
				$controlVenta->setCliente($nuevoCliente);
				$controlVenta->setEstado($nuevoEstado);
				$controlVenta->setFecha($control->fecha);
				$controlVenta->setNumeroOrdenInstalacion($control->numero_instalacion);
				$listaControlVentas[] = $controlVenta;
			}
			return $listaControlVentas;
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}
}
