<?php

use aplicacion\modelo\Estado\Estado;
use ControlVentas\ControlVentas;
use servicio\Servicio;
use vista\Vista;

class ControladorControlVentas
{

    public function index()
    {
        validarSession();
        $ControlVentas = new ControlVentas();
        $listaControlVentas = $ControlVentas->listar();
        return Vista::crear("ControlVentas.ListarControlVentas", "listaControlVentas", $listaControlVentas);
    }

    public function editar($id_ventas)
    {
	    validarSession();
	    $listaEstados = (new Estado)->listarEstados();
	    $listaServicios = Servicio::listar();
	    $ControlVentas = new ControlVentas();
	    $ControlVentas = $ControlVentas->Obtener($id_ventas);
	    return Vista::crear("ControlVentas.Actualizar",
		    array("ControlVentas" => $ControlVentas, "listaEstados" => $listaEstados, "listaServicios" => $listaServicios));
    }

    public function actualizar()
    {
        validarSession();

        $id_ventas = $_POST['id_ventas'];
        $oferta = $_POST['oferta'];
        $servicio = $_POST['servicio'];
        $estado = $_POST['estado'];
        $numero_orden_instalacion = $_POST['orden_instalacion'];
        $cliente = $_POST['cliente'];
	    $ControlVentas = new ControlVentas();
	    $ControlVentas->setIdVentas($id_ventas);
	    $ControlVentas->setOferta($oferta);
	    $ControlVentas->setServicio($servicio);
	    $ControlVentas->setEstado($estado);
	    $ControlVentas->setNumeroOrdenInstalacion($numero_orden_instalacion);
	    $resultado = $ControlVentas->Actualizar();
        if ($resultado) {
            redirecciona("seguimiento/cliente/".$cliente);
        } else {
            self::editar($id_ventas);
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
        $ControlVentas->setUsuario($idAsesor);
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
        return Vista::crear("ControlVentas.Registrar");
    }

    public function eliminar($id_ventas,$idCliente = null)
    {
        validarSession();
        $ControlVentas = new ControlVentas();
        $ControlVentas->Eliminar($id_ventas);
	    ($idCliente!==null) ? redirecciona("seguimiento/cliente/".$idCliente) : redirecciona("control_ventas");
    }
}
