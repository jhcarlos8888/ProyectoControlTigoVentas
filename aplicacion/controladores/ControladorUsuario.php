<?php

require __DIR__ . '/../modelo/Usuario.php';

class ControladorUsuario
{

    public function index()
    {

        Vista::crear("usuario.PruebaVista");

    }

    public function loguear()
    {
        $email = $_POST['email'];
        $contrasena = $_POST['clave'];

        $usuario = new Usuario();

        Vista::crear("usuario.ListarUsuarios");

        /*if ($usuario->ConsultarUsuario($email)) {

            if (strcmp($usuario->getContrasena(), $contrasena) === 0) {

                $_SESSION['id_user'] = $usuario->getIdUsuario();
                $_SESSION['nombre_user'] = $usuario->getNombre();

                header("Location: ../vistas/plantilla.php");

                die();
            }else{
                header("Location: ../index.php");
                die();
            }
        } else {
            header("Location: ../index.php");
            die();
        }*/
    }

}