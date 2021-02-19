<?php

use cliente\Cliente;
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
      return Vista::crear("Clientes.servicio.ActualizarServicio");
    }

    public function editar($id_servicios)
    {
        validarSession();

        $servicio = new Servicio();
        $servicio = $servicio->ConsultarServicio($id_servicio);

        return Vista::crear("servicio.ActualizarServicio", "servicio", $servicio);
    }

    public function actualizar()
    {
        validarSession();

        $id_servicio = $_POST['id_servicio'];
        $tipo_servicio = $_POST['tipo_servicio'];


        $servicio = new Servicio();
        $servicio->__set("id_servicio",$id_servicio);


        $resultado = $servicio->ActualizarServicio();

        if ($resultado) {
            redirecciona("servicio");
        } else {
            self::editar($servicio->__get("id_servicio"));
        }
    }

    public function crear()
    {
        validarSession();

        $servicio = $_POST['tipo_servicio'];


        $servicio = new Servicio();

        $servicio->__set("servicio",$tipo_servicio);


        $resultado = $servicio->CrearServicio();

        if ($resultado) {
            redirecciona("servicio");
        } else {
            self::registrar();
        }
    }

    //public function registrar()
    //{
        //validarSession();

      //  $roles = array(
      //      "1" => "Administrador",
      //      "2" => "Coordinador Comercial",
      //      "3" => "Asesor Comercial"
    //    );

      //  $sedes = array(
      //      "1040" => "San Diego",
      //      "1041" => "Santa Fe",
      //      "1042" => "Molinos",
      //      "1043" => "Oriental"
      //  );

      //  return Vista::crear("usuario.registrar", array("sedes" => $sedes, "roles" => $roles));
  //  }

    public function eliminar($id_servicio)
    {
        validarSession();

        $servicio = new Servicio();
        $servicio->EliminarServicio($id_servicio);

        redirecciona("servicio");
    }
}
