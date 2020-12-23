<?php

class ControladorPrincipal
{
    public function index(){
        Vista::crear("index");
    }

    public function prueba(){
        Vista::crear("usuario.ListaUsuarios");
    }
}