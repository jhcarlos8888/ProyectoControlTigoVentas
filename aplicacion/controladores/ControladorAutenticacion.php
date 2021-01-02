<?php

use usuario\Usuario;
use vista\Vista;

class ControladorAutenticacion
{

    public function login()
    {
        $cedula = $_POST['cedula'];
        $contrasena = $_POST['clave'];

        $usuario = new Usuario();

        if ($usuario->LoguearUsuario($cedula, $contrasena)) {

            $listaUsuarios = $usuario->ListarUsuarios();

            return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
        } else {

            $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

            header("location:/" . trim($urlprin, "/") . "" . "");
        }
    }
}