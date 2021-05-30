<?php

namespace Cliente;

use Conexion;
use Exception;
use PDO;

class Cliente
{
    private $id;
    private $identificacion;
    private $nombre;
    private $celular;
    private $direccion;
    private $email;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * crud Class Cliente
     */

    public function listar()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $result = array();
            $stm = $conexion->prepare("SELECT * FROM cliente");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $clt = new cliente();
                $clt->__SET('id', $r->id);
                $clt->__SET('identificacion', $r->identificacion);
                $clt->__SET('nombre', $r->nombre);
                $clt->__SET('celular', $r->celular);
                $clt->__SET('direccion', $r->direccion);
                $clt->__SET('email', $r->email);

                $result[] = $clt;
            }
            $conexionDataBase->CerrarConexion();
            return $result;
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $stm = $conexion->prepare("SELECT * FROM cliente WHERE id = ?");
            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $clt = new cliente();
            $clt->__SET('id', $r->id);
            $clt->__SET('identificacion', $r->identificacion);
            $clt->__SET('nombre', $r->nombre);
            $clt->__SET('celular', $r->celular);
            $clt->__SET('direccion', $r->direccion);
            $clt->__SET('email', $r->email);
            $conexionDataBase->CerrarConexion();
            return $clt;
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $stm = $conexion->prepare("DELETE FROM cliente WHERE id = ?");
            $stm->execute(array($id));
            $conexionDataBase->CerrarConexion();
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Actualizar($cliente)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $sql = "UPDATE cliente SET identificacion = ?, nombre = ?, celular = ?, direccion = ?, email = ? WHERE id = ?";

            $resultado = $conexion->prepare($sql)
                ->execute(array(
                    $cliente->__GET('identificacion'),
                    $cliente->__GET('nombre'),
                    $cliente->__GET('celular'),
                    $cliente->__GET('direccion'),
                    $cliente->__GET('email'),
                    $cliente->__GET('id')
                ));
            $conexionDataBase->CerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage());
        }
    }

    public function Registrar()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        try {
            $sql = "INSERT INTO cliente (identificacion, nombre, celular, direccion, email) VALUES (?, ?, ?, ?, ?)";

            $resultado = $conexion->prepare($sql)
                ->execute(array(
                    $this->__GET('identificacion'),
                    $this->__GET('nombre'),
                    $this->__GET('celular'),
                    $this->__GET('direccion'),
                    $this->__GET('email'),
                ));
            $conexionDataBase->CerrarConexion();
            return $resultado;
        } catch (Exception $e) {
            $conexionDataBase->CerrarConexion();
            die($e->getMessage() . $e->getFile() . $e->getTraceAsString());
        }
    }

    public function Buscar($valor)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $clientes = array();
        $valor = $valor . "%";
        $stmt = $conexion->prepare("SELECT * FROM cliente WHERE identificacion LIKE :cedula OR nombre LIKE :nombre");
        $stmt->bindParam(":cedula", $valor);
        $stmt->bindParam(":nombre", $valor);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {
            $cliente = array(
                "id" => $fila->id,
                "identificacion" => $fila->identificacion,
                "nombre" => $fila->nombre,
                "celular" => $fila->celular,
                "direccion" => $fila->direccion,
                "email" => $fila->email,
            );
            $clientes[] = $cliente;
        }
        $conexionDataBase->CerrarConexion();
        return $clientes;
    }
}
