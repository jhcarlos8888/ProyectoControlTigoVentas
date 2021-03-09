<?php

use ControlVentas\ControlVentas;
use vista\Vista;

class ControladorControlVentas
{

    public function index()
    {
        validarSession();

        $ControlVentas = new ControlVentas();

        $listarControlVentas = $ControlVentas->listar();

        return Vista::crear("control_ventas.ListarControlVentas", "ListarControlVentas", $listarControlVentas);
    }

    public function editar($id_ventas)
    {
        validarSession();

        $ControlVentas = new ControlVentas();
        $ControlVentas = $ControlVentas->Obtener($id_ventas);

        return Vista::crear("control_ventas.actualizarCV", "ControlVentas", $ControlVentas);
    }

    public function actualizar()
    {
        validarSession();

        $id_ventas = $_POST['id_ventas'];
        $oferta = $_POST['oferta'];
        $asesor = $_POST['asesor'];
        $cliente = $_POST['cliente'];
        $servicio = $_POST['servicio'];
        $estado = $_POST['estado'];
        $fecha = $_POST['fecha'];
        $numero_orden_instalacion = $_POST['numero_orden_instalacion'];

        $ControlVentas = new ControlVentas();

        $ControlVentas->__set("id_ventas",$id_ventas);
        $ControlVentas->__set("oferta", $oferta);
        $ControlVentas->__set("asesor", $asesor);
        $ControlVentas->__set("cliente", $cliente);
        $ControlVentas->__set("servicio", $servicio);
        $ControlVentas->__set("estado", $estado);
        $ControlVentas->__set("fecha", $fecha);
        $ControlVentas->__set("numero_orden_instalacion", $numero_orden_instalacion);
        $resultado = $ControlVentas->Actualizar($ControlVentas);

        if ($resultado) {
            redirecciona("ControlVentas");
        } else {
            self::editar($ControlVentas);
            die();
        }
    }

    public function crear()
    {
        validarSession();

        $oferta = $_POST['oferta'];
        $idAsesor = $_SESSION['id_user'];
        $idCliente = $_POST['cliente'];
        $idServicio = $_POST['servicio'];
        $idEstado = $_POST['estado'];
        $fechaActual = getdate();
        $fechaFormateada = $fechaActual['year']."-".$fechaActual['mon']."-".$fechaActual['mday'];
        $numero_orden_instalacion = $_POST['orden_instalacion'];

        $ControlVentas = new ControlVentas();

        $ControlVentas->setOferta($oferta);
        $ControlVentas->setAsesor($idAsesor);
        $ControlVentas->setCliente($idCliente);
        $ControlVentas->setServicio($idServicio);
        $ControlVentas->setEstado($idEstado);
        $ControlVentas->setFecha($fechaFormateada);
        $ControlVentas->setNumeroOrdenInstalacion($numero_orden_instalacion);

        $ControlVentas->Registrar();

        redirecciona("seguimiento/cliente/".$idCliente);
    }

    public function registrar()
    {
        validarSession();

        return Vista::crear("control_ventas.RegistrarCV");
    }

    public function eliminar($id_ventas)
    {
        validarSession();

        $ControlVentas = new ControlVentas();
        $ControlVentas->Eliminar($id_ventas);

        redirecciona("ControlVentas");
    }
}
