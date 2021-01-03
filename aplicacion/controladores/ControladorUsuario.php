<?php

use usuario\Usuario;
use vista\Vista;

class ControladorUsuario
{

    public function editar()
    {
        $id = $_REQUEST['id'];

        $usuario = new Usuario();
        $usuario = $usuario->ConsultarUsuario($id);

        return Vista::crear("usuario.actualizar","usuario",$usuario);
    }

    public function actualizar()
    {
        $id = $_POST['id'];
        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $user = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        $email = $_POST['email'];
        $sede = $_POST['sede'];
        $rol = $_POST['rol'];

        $usuario = new Usuario();

        $usuario->setIdUsuario($id);
        $usuario->setIdentificacion($identificacion);
        $usuario->setNombre($nombre);
        $usuario->setCelular($celular);
        $usuario->setUsuario($user);
        $usuario->setContrasena($contrasena);
        $usuario->setEmail($email);
        $usuario->setZonaSede($sede);
        $usuario->setRol($rol);

        $resultado = $usuario->ActualizarUsuario();

        if ($resultado) {
            $listaUsuarios = $usuario->ListarUsuarios();
            return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
        } else {
            self::registrar();
        }

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

    public function eliminar()
    {

        $id = $_REQUEST['id'];

        $usuario = new Usuario();

        $usuario->EliminarUsuario($id);

        $listaUsuarios = $usuario->ListarUsuarios();
        return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
    }
}