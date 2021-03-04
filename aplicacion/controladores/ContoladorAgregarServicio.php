<?php

use servicio\Servicio;
use vista\Vista;

class ControladorAgregarServicio
{

    public function index()
    {
    validarSession();
    return Vista::crear("Clientes.servicio.formServicio");
   }

   public function servicio($id_servicio)
   {
     validarSession();
     return Vista::crear("Clientes.servicio.formServicio");
   }

}
