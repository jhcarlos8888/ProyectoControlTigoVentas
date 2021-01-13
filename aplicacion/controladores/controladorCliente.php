<?php

use Cliente\Cliente;
use vista\Vista;

class ControladorCliente
{

    public function index()
    {
        $cliente = new cliente();

        $ListarCliente = $cliente->ListarClientes();

        return Vista::crear("Cliente.ListarClientes", "Listacliente", $listacliente);
    }

    public function editar($id)
    {
        /*$id = $_REQUEST['id'];*/

        $cliente = new cliente();
        $cliente = $cliente->Consultarcliente($id);

        return Vista::crear("cliente.actualizar", "cliente", $cliente);
    }

    public function actualizar()
    {
        $id = $_POST['id'];
        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];


        $cliente = new cliente();

        $cliente->setIdUsuario($id);
        $cliente->setIdentificacion($identificacion);
        $cliente->setNombre($nombre);
        $cliente->setCelular($celular);
        $cliente->setDireccion($direccion);
        $cliente->setEmail($email);
        $resultado = $cliente->Actualizarcliente();

        if ($resultado) {
            $listacliente = $cliente->ListarCliente();
            return Vista::crear("cliente.ListarClientes", "listacliente", $listacliente);
        } else {
            self::registrar();
        }

    }

    public function crear()
    {

        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $celular = $_POST['celular'];
        $direccion = $_POST['direccion'];
        $email = $_POST['email'];


        $cliente = new cliente();

        $cliente->setIdentificacion($identificacion);
        $cliente->setNombre($nombre);
        $cliente->setCelular($celular);
        $cliente->setDireccion($direccion);
        $cliente->setEmail($email);


        $resultado = $cliente->Crearcliente();

        if ($resultado) {
            $listacliente = $cliente->Listarcliente();
            return Vista::crear("cliente.ListarClientes", "listacliente", $listacliente);
        } else {
            self::registrar();
        }

    }
/**
    public function registrar()
    {

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

        return Vista::crear("usuario.registrar", array("sedes"=>$sedes,"roles"=>$roles));
    }
**/
    public function eliminar($id)
    {

        /*$id = $_REQUEST['id'];*/

        $cliente = new cliente();

        $cliente->Eliminarcliente($id);

        $listacliente = $cliente->ListarCliente();
        return Vista::crear("cliente.ListarClientes", "listacliente", $listacliente);
    }
}
