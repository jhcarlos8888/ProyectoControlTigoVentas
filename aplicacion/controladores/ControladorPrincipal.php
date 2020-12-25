<?php

use \vista\Vista;

class ControladorPrincipal
{
    public function index(){
        Vista::crear("index");
    }

    public function prueba(){

        $test = "Pasa test";

        return Vista::crear("usuario.ListarUsuarios");
    }
}