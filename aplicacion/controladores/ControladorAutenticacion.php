<?php

use usuario\Usuario;
use vista\Vista;

class ControladorAutenticacion
{

    private $errores = array();
    private $cedula;
    private $contrasena;


    public function index()
    {
        return Vista::crear("index");
    }

    public function login()
    {
        $this->errores = array();
        $this->cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null;
        $this->contrasena = isset($_POST['clave']) ? $_POST['clave'] : null;

        self::_validar();

        if($this->errores){
            foreach ($this->errores as $error){
                echo $error , '<br>';
            }
            return Vista::crear("index", "errores", $this->errores);
        }else{

            $usuario = new Usuario();

            if ($usuario->LoguearUsuario($this->cedula, $this->contrasena)) {

                $listaUsuarios = $usuario->ListarUsuarios();

                return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
            } else {


                $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

                header("location:/" . trim($urlprin, "/"));
            }
        }
    }

    public function logout(){

        $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);
        header("location:/" . trim($urlprin, "/"));
    }

    private function _validar(){

        $this->cedula = htmlspecialchars($this->cedula);
        $this->contrasena = htmlspecialchars($this->contrasena);

        if(!validate($this->cedula,"requerido", "numerico")){
            $this->errores['cedula'] = "El campo es requerido y numerico";
        }

        if(!validate($this->contrasena,"requerido")){
            $this->errores['contrasena'] = "Valor es requerido";
        }
    }
}