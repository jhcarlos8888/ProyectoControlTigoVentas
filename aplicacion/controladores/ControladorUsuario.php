<?php

use \vista\Vista;

class ControladorUsuario
{

    public function index()
    {

        return Vista::crear("");

    }

    public function loguin()
    {
        /*$email = $_POST['email'];
        $contrasena = $_POST['clave'];

        $usuario = new Usuario();*/

        return Vista::crear("usuario.ListarUsuarios");

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