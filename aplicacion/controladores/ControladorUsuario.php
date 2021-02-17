<?php

use usuario\Usuario;
use vista\Vista;

class ControladorUsuario
{

    public function index()
    {
        validarSession();

        $usuario = new Usuario();
        $listaUsuarios = $usuario->ListarUsuarios();

        return Vista::crear("usuario.ListarUsuarios", "listaUsuarios", $listaUsuarios);
    }

    public function editar($id)
    {
        validarSession();

        $usuario = new Usuario();
        $usuario = $usuario->ConsultarUsuario($id);

        return Vista::crear("usuario.actualizar", "usuario", $usuario);
    }

    public function actualizar()
    {
        validarSession();

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
        $usuario->__set("id_usuario",$id);
        $usuario->__set("identificacion",$identificacion);
        $usuario->__set("nombre",$nombre);
        $usuario->__set("celular",$celular);
        $usuario->__set("usuario",$user);
        $usuario->__set("contrasena",$contrasena);
        $usuario->__set("email",$email);
        $usuario->__set("zona_sede",$sede);
        $usuario->__set("rol",$rol);

        $resultado = $usuario->ActualizarUsuario();

        if ($resultado) {
            redirecciona("usuario");
        } else {
            self::editar($usuario->__get("id_usuario"));
        }
    }

    public function crear()
    {
        validarSession();

        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $user = $_POST['usuario'];
        $contrasena = encriptar($_POST['contrasena']);
        $email = $_POST['email'];
        $sede = $_POST['sede'];
        $rol = $_POST['rol'];

        $usuario = new Usuario();

        $usuario->__set("identificacion",$identificacion);
        $usuario->__set("nombre",$nombre);
        $usuario->__set("celular",$celular);
        $usuario->__set("usuario",$user);
        $usuario->__set("contrasena",$contrasena);
        $usuario->__set("email",$email);
        $usuario->__set("zona_sede",$sede);
        $usuario->__set("rol",$rol);

        $resultado = $usuario->CrearUsuario();

        if ($resultado) {
            redirecciona("usuario");
        } else {
            redirecciona("usuario/registrar");
        }
    }

    public function registrar()
    {
        validarSession();

        $roles = array(
            "1" => "Administrador",
            "2" => "Coordinador Comercial",
            "3" => "Asesor Comercial"
        );

        $sedes = array(
            "1040" => "San Diego",
            "1041" => "Santa Fe",
            "1042" => "Molinos",
            "1043" => "Oriental"
        );

        return Vista::crear("usuario.registrar", array("sedes" => $sedes, "roles" => $roles));
    }

    public function eliminar($id)
    {
        validarSession();

        $usuario = new Usuario();
        $usuario->EliminarUsuario($id);

        redirecciona("usuario");
    }
}