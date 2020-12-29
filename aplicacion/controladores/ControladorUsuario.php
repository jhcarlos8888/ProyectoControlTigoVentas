<?php

use usuario\Usuario;
use vista\Vista;

class ControladorUsuario
{

    public function index()
    {

        return Vista::crear("");

    }

    public function loguin()
    {
        $email = $_POST['email'];
        $contrasena = $_POST['clave'];


        $usuario = new Usuario();

        if ($usuario->LoguearUsuario("$email", "$contrasena")) {

            $listaUsuarios = $usuario->ListarUsuarios();

            return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
        } else {

            $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

            header("location:/" . trim($urlprin, "/") . "" . "");
        }


        /*if ($usuario->ConsultarUsuario($email)) {

            if (strcmp($usuario->getContrasena(), $contrasena) === 0) {

                $_SESSION['id_user'] = $usuario->getIdUsuario();
                $_SESSION['nombre_user'] = $usuario->getNombre();
            */
    }

    public function crear()
    {

        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $user = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $email = $_POST['email'];
        $sede = $_POST['sede'];
        $rol = $_POST['rol'];

        $usuario = new Usuario();

        $usuario->setIdentificacion($identificacion);
        $usuario->setNombre($nombre);
        $usuario->setCelular($celular);
        $usuario->setUsuario($user);
        $usuario->setContrasena($contrasena);
        $usuario->setEmail($email);
        $usuario->setZonaSede($sede);
        $usuario->setRol($rol);

        $resultado = $usuario->CrearUsuario();

        if ($resultado) {
            $listaUsuarios = $usuario->ListarUsuarios();
            return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
        } else {
            self::registrar();
        }

    }

    public function registrar()
    {
        return Vista::crear("usuario.registrar");
    }

}