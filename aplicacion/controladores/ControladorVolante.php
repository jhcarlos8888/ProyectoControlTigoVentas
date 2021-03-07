<?php

use vista\Vista;
use aplicacion\modelo\Volante;

class ControladorVolante
{

    public function index()
    {
        validarSession();

        $nuevoVolante = new Volante();

        $listaDeVolantes = $nuevoVolante->listarManuales();

        return Vista::crear("volante.ListarVolantes", "listaDeVolantes", $listaDeVolantes);
    }

    public function subir()
    {
        validarSession();

        return Vista::crear("volante.registrar");
    }

    public function crear()
    {
        validarSession();

        $nombre = $_POST['nombre'];
        $rutaTemporal = $_FILES['volante']['tmp_name'];
        $fileExtension = ".pdf";
        $rutaFinal = "./assets/volantes/" . $nombre . $fileExtension;
        $resultado = move_uploaded_file($rutaTemporal, $rutaFinal);

        if ($resultado) {
            $ruta = "volantes/" . $nombre . $fileExtension;
            $nuevoVolante = new Volante();
            $nuevoVolante->setNombre($nombre);
            $nuevoVolante->setRuta($ruta);
            $nuevoVolante->subirVolante();
        }
        redirecciona("volante");
    }
}