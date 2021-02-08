<?php

use manual\Manual;
use vista\Vista;

class ControladorManuales
{

    public function index()
    {
        validarSession();

        $nuevoManual = new Manual();

        $listaDemanuales = $nuevoManual->listarManuales();

        return Vista::crear("manual.ListarManuales", "listaDeManuales", $listaDemanuales);
    }

    public function subir()
    {
        validarSession();

        return Vista::crear("manual.registrar");
    }

    public function crear()
    {
        validarSession();

        $nombre = $_POST['nombre'];
        $archivo = $_FILES['manual'];
        $rutaMelodia = $_FILES['melodia']['tmp_name'];

        $nuevoManual = new Manual();

        $nuevoManual->setNombre($nombre);
        $nuevoManual->setRuta($rutaMelodia);

        
    }

}