<?php

require __DIR__ . '/../modelo/Usuario.php';

$proceso = (isset($_POST['proceso'])) ? $_POST['proceso'] : "index";

switch ($proceso) {

    case "index":
        header("Location: ../index.php");
        die();

    case "login":

        $email = $_POST['email'];
        $contrasena = $_POST['clave'];

        $usuario = new Usuario();

        if ($usuario->ConsultarUsuario($email)) {

            if (strcmp($usuario->getContrasena(), $contrasena) == 0) {
                header("Location: ../plantilla.php");
                die();
            }else{
                header("Location: ../index.php");
                die();
            }
        } else {
            header("Location: ../index.php");
            die();
        }

}
