<?php

use Cliente\Cliente;
use vista\Vista;

class ControladorCliente
{

    public function index()
    {
        validarSession();
        $cliente = new Cliente();
        $listaClientes = $cliente->listar();
        return Vista::crear("Clientes.ListarClientes", "ListarClientes", $listaClientes);
    }

    public function editar($id)
    {
        validarSession();
        $cliente = new cliente();
        $cliente = $cliente->Obtener($id);
        return Vista::crear("Clientes.actualizar", "cliente", $cliente);
    }

    public function actualizar()
    {
        validarSession();
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
            redirecciona("cliente");
        } else {
            self::editar($cliente);
            die();
        }
    }

    public function crear()
    {
        validarSession();
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
            redirecciona("cliente");
        } else {
            self::registrar();
            die();
        }
    }

    public function registrar()
    {
        validarSession();
        return Vista::crear("Clientes.registrar");
    }

    public function eliminar($id)
    {
        validarSession();
		$this->validarRol();
        $cliente = new cliente();
        $cliente->Eliminar($id);
        redirecciona("cliente");
    }

	private function validarRol(){
		if($_SESSION['rol_user'] !== "Administrador" || $_SESSION['rol_user'] !== "Coordinador Comercial"){
			redirecciona("");
			exit();
		}
	}
}
