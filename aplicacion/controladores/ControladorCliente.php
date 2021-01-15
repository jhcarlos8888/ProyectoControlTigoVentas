<?php

use Cliente\Cliente;
use vista\Vista;

class ControladorCliente
{

    public function index()
    {
        $cliente = new Cliente();

        $listaClientes = $cliente->listar();

        return Vista::crear("Clientes.ListarClientes", "ListarClientes", $listaClientes);
    }

    public function editar($id)
    {
        $cliente = new cliente();
        $cliente = $cliente->Obtener($id);

        return Vista::crear("Clientes.actualizar", "cliente", $cliente);
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

        $cliente->__set("id",$id);
        $cliente->__set("identificacion", $identificacion);
        $cliente->__set("nombre", $nombre);
        $cliente->__set("celular", $celular);
        $cliente->__set("direccion", $direccion);
        $cliente->__set("email", $email);
        $resultado = $cliente->Actualizar($cliente);

        if ($resultado) {
            $listacliente = $cliente->listar();
            return Vista::crear("Clientes.ListarClientes", "ListarClientes", $listacliente);
        } else {
            self::editar($cliente);
            die();
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

        $cliente->__set("identificacion", $identificacion);
        $cliente->__set("nombre", $nombre);
        $cliente->__set("celular", $celular);
        $cliente->__set("direccion", $direccion);
        $cliente->__set("email", $email);

        $resultado = $cliente->Registrar();

        if ($resultado) {
            $ListarClientes = $cliente->listar();
            return Vista::crear("Clientes.ListarClientes", "ListarClientes", $ListarClientes);
        } else {
            self::registrar();
            die();
        }
    }

    public function registrar()
    {
        return Vista::crear("Clientes.registrar");
    }

    public function eliminar($id)
    {
        $cliente = new cliente();

        $cliente->Eliminar($id);

        $listacliente = $cliente->listar();
        return Vista::crear("Clientes.ListarClientes", "ListarClientes", $listacliente);
    }
}
