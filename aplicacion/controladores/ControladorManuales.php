<?php


use vista\Vista;

class ControladorManuales
{

    public function index(){

        validarSession();

        return Vista::crear("manual.ListarManuales");
    }

}