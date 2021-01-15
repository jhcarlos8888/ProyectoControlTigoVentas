<?php

namespace Cliente;

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
    private $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=ControlVentas', USER, PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

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
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM cliente");
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

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cliente WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $clt = new cliente();

            $clt->__SET('id', $r->id);
            $clt->__SET('identificacion', $r->identificacion);
            $clt->__SET('nombre', $r->nombre);
            $clt->__SET('celular', $r->celular);
            $clt->__SET('direccion', $r->direccion);
            $clt->__SET('email', $r->email);

            return $clt;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM cliente WHERE id = ?");
            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($cliente)
    {
        try {
            $sql = "UPDATE cliente SET identificacion = ?, nombre = ?, celular = ?, direccion = ?, email = ? WHERE id = ?";

            return $this->pdo->prepare($sql)
                ->execute(array(
                    $cliente->__GET('identificacion'),
                    $cliente->__GET('nombre'),
                    $cliente->__GET('celular'),
                    $cliente->__GET('direccion'),
                    $cliente->__GET('email'),
                    $cliente->__GET('id')
                ));

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar()
    {
        try {
            $sql = "INSERT INTO cliente (identificacion, nombre, celular, direccion, email) VALUES (?, ?, ?, ?, ?)";

            return $this->pdo->prepare($sql)
                ->execute(array(
                    $this->__GET('identificacion'),
                    $this->__GET('nombre'),
                    $this->__GET('celular'),
                    $this->__GET('direccion'),
                    $this->__GET('email'),
                ));
        } catch (Exception $e) {
            die($e->getMessage() . $e->getFile() . $e->getTraceAsString());
        }
    }
}
