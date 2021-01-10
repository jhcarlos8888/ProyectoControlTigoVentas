<?php

use \vista\Vista;

class ControladorPrincipal
{
    public function index(){

        $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

        header("location:/" . trim($urlprin, "/") . "/autenticacion");
    }

    public function prueba(){

        $test = "Pasa test";

        return Vista::crear("usuario.ListarUsuarios");
    }
}