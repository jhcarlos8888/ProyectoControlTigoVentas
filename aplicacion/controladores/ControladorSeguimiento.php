<?php

use aplicacion\modelo\Estado\Estado;
use Cliente\Cliente;
use ControlVentas\ControlVentas;
use servicio\Servicio;
use vista\Vista;

class ControladorSeguimiento
{

    public function index()
    {
	    validarSession();
	    redirecciona("control_ventas");
    }


    public function cliente($id)
    {
        validarSession();
        $controlVenta = new ControlVentas();
        $cliente = (new Cliente)->Obtener($id);
        $Listado = $controlVenta->ListarControlVentasDelCliente($id);
        return Vista::crear("Clientes.servicio.ListaServicios",
            array("Listado" => $Listado, "cliente" => $cliente));
    }

    public function registrar($idCliente)
    {
        validarSession();
        $cliente = (new Cliente)->Obtener($idCliente);
        $listaEstados = (new Estado)->listarEstados();
        $listaServicios = Servicio::listar();
        return Vista::crear("Clientes.servicio.Registrar",
            array("cliente" => $cliente, "listaEstados" => $listaEstados, "listaServicios" => $listaServicios));
    }

    //esto no va aqui esto esta mal
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
}
