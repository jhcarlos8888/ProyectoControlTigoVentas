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

            return Vista::crear("usuario.ListarUsuarios");
        } else {

            $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

            header("location:/".trim($urlprin,"/").""."");
        }



        /*if ($usuario->ConsultarUsuario($email)) {

            if (strcmp($usuario->getContrasena(), $contrasena) === 0) {

                $_SESSION['id_user'] = $usuario->getIdUsuario();
                $_SESSION['nombre_user'] = $usuario->getNombre();
            */
    }

    public function crear(){

        $usuario = new Usuario();

        $usuario->setIdentificacion("123456");
        $usuario->setNombre("Prueba");
        $usuario->setCelular("312132133");
        $usuario->setUsuario("prueba1");
        $usuario->setContrasena("pass");
        $usuario->setEmail("prueba@test.com");
        $usuario->setZonaSede(1040);
        $usuario->setRol(2);

        $resultado = $usuario->CrearUsuario();
        echo $resultado;
        echo $usuario->getIdUsuario();
    }

}