<?php

use \vista\Vista;

class ControladorPrincipal
{
    public function index(){

        $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

        header("location:/" . trim($urlprin, "/") . "/autenticacion");
    }
}