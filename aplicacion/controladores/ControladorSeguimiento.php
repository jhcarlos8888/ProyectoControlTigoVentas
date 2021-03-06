<?php

use ControlVentas\ControlVentas;
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
        $Listado = $controlVenta->ListarControlVentasDelCliente($id);

        return Vista::crear("Clientes.servicio.ActualizarServicio", "Listado", $Listado);
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


        $servicio = new Servicio();
        $servicio->__set("id_servicio", $id_servicio);


        $resultado = $servicio->ActualizarServicio();

        if ($resultado) {
            redirecciona("servicio");
        } else {
            self::editar($servicio->__get("id_servicio"));
        }
    }

    public function eliminar($id_servicio)
    {
        validarSession();

        $servicio = new Servicio();
        $servicio->EliminarServicio($id_servicio);

        redirecciona("servicio");
    }
}
