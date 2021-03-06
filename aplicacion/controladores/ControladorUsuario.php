<?php

use aplicacion\modelo\Rol\Rol;
use aplicacion\modelo\Sede\Sede;
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
        $roles = Rol::ListarRoles();
        $sedes = Sede::ListarSedes();

        return Vista::crear("usuario.actualizarUsuario",
            array("usuario" => $usuario, "sedes" => $sedes, "roles" => $roles));
    }

    public function actualizar()
    {
        validarSession();

        $id = $_POST['id'];
        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $user = $_POST['usuario'];
        $email = $_POST['email'];
        $sede = Sede::consultarSede($_POST['sede']);
        $rol = Rol::consultarRol($_POST['rol']);

        $usuario = new Usuario();
        $usuario->__set("id_usuario", $id);
        $usuario->__set("identificacion", $identificacion);
        $usuario->__set("nombre", $nombre);
        $usuario->__set("celular", $celular);
        $usuario->__set("usuario", $user);
        $usuario->__set("email", $email);
        $usuario->__set("sede", $sede);
        $usuario->__set("rol", $rol);

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
        $sede = Sede::consultarSede($_POST['sede']);
        $rol = Rol::consultarRol($_POST['rol']);
        $usuario = new Usuario();

        $usuario->__set("identificacion", $identificacion);
        $usuario->__set("nombre", $nombre);
        $usuario->__set("celular", $celular);
        $usuario->__set("usuario", $user);
        $usuario->__set("contrasena", $contrasena);
        $usuario->__set("email", $email);
        $usuario->__set("sede", $sede);
        $usuario->__set("rol", $rol);

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

        $roles = Rol::ListarRoles();
        $sedes = Sede::ListarSedes();

        return Vista::crear("usuario.registrar", array("sedes" => $sedes, "roles" => $roles));
    }

    public function eliminar($id)
    {
        validarSession();

        $usuario = new Usuario();
        $usuario->EliminarUsuario($id);

        redirecciona("usuario");
    }

    public function cambiarContrasena()
    {

        validarSession();

        $id = $_POST['id'];
        $nuevaContrasena = $_POST['contrasena'];
        $validacionContrasena = $_POST['validacionContrasena'];
        $resultado = false;

        if ($nuevaContrasena === $validacionContrasena) {

            $usuario = new Usuario();
            $contrasenaEncriptada = encriptar($_POST['contrasena']);
            $resultado = $usuario->cambiarContrasena($id, $contrasenaEncriptada);
        }

        if ($resultado) {
            redirecciona("usuario");
        } else {
            redirecciona("usuario/editar/" . $id);
        }
    }
}