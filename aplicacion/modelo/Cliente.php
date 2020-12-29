<?php


class Cliente
{
    private $id_cliente;
    private $identificacion;
    private $nombre;
    private $celular;
    private $direccion;
    private $email;

    /**
     * Cliente constructor.
     * @param $id_cliente
     * @param $identificacion
     * @param $nombre
     * @param $celular
     * @param $direccion
     * @param $email
     */
    public function __construct($id_cliente, $identificacion, $nombre, $celular, $direccion, $email)
    {
        $this->id_cliente = $id_cliente;
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->direccion = $direccion;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * @param mixed $identificacion
     */
    public function setIdentificacion($identificacion): void
    {
        $this->identificacion = $identificacion;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular): void
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    
    /**
     * crud Class Cliente
     */
    class Cliente
{
    private $pdo;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = new PDO('mysql:host=localhost;dbname=ControlVentas', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function crear()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM Clientes");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $clt = new cliente();

                $clt->__SET('id', $r->id);
                $clt->__SET('identificacion', $r->identificacion);
                $clt->__SET('Nombre', $r->Nombre);
                $clt->__SET('celular', $r->celular);
                $clt->__SET('direccion', $r->direccion);
                $clt->__SET('email', $r->email);

                $result[] = $clt;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function consultar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM Clientes WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $clt = new cliente();

            $clt->__SET('id', $r->id);
                $clt->__SET('identificacion', $r->identificacion);
                $clt->__SET('Nombre', $r->Nombre);
                $clt->__SET('celular', $r->celular);
                $clt->__SET('direccion', $r->direccion);
                $clt->__SET('email', $r->email);

            return $clt;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM Clientes WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Cliente $data)
    {
        try 
        {
            $sql = "UPDATE Cliente SET 
                        identificacion
                        Nombre          = ?, 
                        celular       = ?,
                        direccion           = ?, 
                        email = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('identificacion'), 
                    $data->__GET('Nombre', 
                    $data->__GET('celular'),
                    $data->__GET('email'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
    
    /**
    *registrar cliente
    
    public function Registrar(cliente $data)
    {
        try 
        {
        $sql = "INSERT INTO Cliente (id, identificacion, Nombre,celular, email) 
                VALUES (?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'),
                $data->__GET('identificacion'),
                $data->__GET('Nombre'), 
                $data->__GET('celular'), 
                $data->__GET('email'),
                
                
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
        */
    }
}
        
}