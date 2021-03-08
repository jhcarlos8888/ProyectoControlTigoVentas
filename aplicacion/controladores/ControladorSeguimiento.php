<?php

use Cliente\Cliente;
use ControlVentas\ControlVentas;
use servicio\Servicio;
use vista\Vista;

class ControladorSeguimiento
{

    public function index()
    {
        validarSession();
        return Vista::crear("Clientes.servicio.ActualizarServicio");
    }


    public function cliente($id)
    {
        validarSession();
        $controlVenta = new ControlVentas();
        $cliente = (new Cliente)->Obtener($id);
        $Listado = $controlVenta->ListarControlVentasDelCliente($id);
        return Vista::crear("Clientes.servicio.ActualizarServicio", array("Listado" => $Listado, "cliente" => $cliente));
    }


    //esto no va aqui esto esta mal
    public function editar($id_servicios)
    {
        validarSession();

        $servicio = Servicio::Obtener($id_servicios);

        return Vista::crear("servicio.ActualizarServicio", "servicio", $servicio);
    }


    public function actualizar()
    {
        validarSession();

        $id_servicio = $_POST['id_servicio'];
        $tipo_servicio = $_POST['tipo_servicio'];


        $servicio = new Servicio($id_servicio, $tipo_servicio);
        $servicio->__set("id_servicio", $id_servicio);


        $resultado = $servicio->Actualizar();

        if ($resultado) {
            redirecciona("servicio");
        } else {
            self::editar($servicio->getIdServicio());
        }
    }

    public function eliminar($id_servicio)
    {
        validarSession();

        $servicio = new Servicio();
        $servicio->Eliminar($id_servicio);

        redirecciona("servicio");
    }
}
