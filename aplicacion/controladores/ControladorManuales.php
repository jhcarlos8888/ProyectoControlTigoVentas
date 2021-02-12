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
        $rutaTemporal = $_FILES['manual']['tmp_name'];
        $fileExtension = ".pdf";
        $rutaFinal = "./assets/manuales/" . $nombre . $fileExtension;
        $resultado = move_uploaded_file($rutaTemporal, $rutaFinal);

        if ($resultado) {
            $ruta = "manuales/" . $nombre . $fileExtension;
            $nuevoManual = new Manual();
            $nuevoManual->setNombre($nombre);
            $nuevoManual->setRuta($ruta);
            $nuevoManual->subirManual();
        }
        redirecciona("manuales");
    }

}