<?php

use Cliente\Cliente;
use usuario\Usuario;

class ControladorBusqueda
{
    public function buscarUsuario($valor){

        $valor = htmlspecialchars($valor);
        $usuario = new Usuario();
        $listaUsuarios = $usuario->Buscar($valor);

        echo json_encode($listaUsuarios);
    }

    public function buscarCliente($valor){

        $valor = htmlspecialchars($valor);
        $cliente = new Cliente();
        $listaClientes= $cliente->Buscar($valor);

        echo json_encode($listaClientes);
    }
}