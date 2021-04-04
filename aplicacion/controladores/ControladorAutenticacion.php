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
        session_start();
        if (isset($_SESSION['id'])) {
            redirecciona("cliente");
        } else {
            return Vista::crear("index");
        }
    }

    public function login()
    {
        $this->errores = array();
        $this->cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null;
        $this->contrasena = isset($_POST['clave']) ? $_POST['clave'] : null;

        self::_validar();

        if ($this->errores) {
            redirecciona("autenticacion");
        } else {

            $usuario = new Usuario();

            if ($usuario->LoguearUsuario($this->cedula, $this->contrasena)) {

                session_start();
                $_SESSION['id'] = session_id();
                $_SESSION['id_user'] = $usuario->__get("id_usuario");
                $_SESSION['nombre_user'] = $usuario->__get("nombre");
                $_SESSION['rol_user'] = $usuario->__get("rol")->getNombre();

                redirecciona("cliente");
            } else {

                redirecciona("autenticacion");
            }
        }
    }

    public function logout()
    {

        session_start();
        session_unset();
        session_destroy();

        redirecciona("autenticacion");
    }

    private function _validar()
    {

        $this->cedula = htmlspecialchars($this->cedula);
        $this->contrasena = htmlspecialchars($this->contrasena);

        if (!validate($this->cedula, "requerido", "numerico")) {
            $this->errores['cedula'] = "El campo es requerido y numerico";
        }

        if (!validate($this->contrasena, "requerido")) {
            $this->errores['contrasena'] = "Valor es requerido";
        }
    }
}