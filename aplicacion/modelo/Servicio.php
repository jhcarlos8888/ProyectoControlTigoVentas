<?php


class Servicio
{
    private $id_servicio;
    private $tipo_servicio;
    private $pdo;

    /**
     * Servicio constructor.
     * @param $id_servicio
     * @param $tipo_servicio
     */
    public function __construct($id_servicio, $tipo_servicio)
    {
        $this->id_servicio = $id_servicio;
        $this->tipo_servicio = $tipo_servicio;
    }

    /**
     * @return mixed
     */
    public function getIdServicio()
    {
        return $this->id_servicio;
    }

    /**
     * @param mixed $id_servicio
     */
    public function setIdServicio($id_servicio): void
    {
        $this->id_servicio = $id_servicio;
    }

    /**
     * @return mixed
     */
    public function getTipoServicio()
    {
        return $this->tipo_servicio;
    }

    /**
     * @param mixed $tipo_servicio
     */
    public function setTipoServicio($tipo_servicio): void
    {
        $this->tipo_servicio = $tipo_servicio;
    }
    /**
     * crud Class servicio
     */

    public function listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM servicios");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $ser = new servicio();

                $ser->__SET('id', $r->id);
                $ser->__SET('tipo_servicio', $r->tipo_servicio);

                $result[] = $ser;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM servicios WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $ser = new servicio();

            $ser->__SET('id', $r->id);
            $ser->__SET('tipo_servicio', $r->tipo_servicio);


            return $ser;
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
                      ->prepare("DELETE FROM servicios WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(servicio $data)
    {
        try
        {
            $sql = "UPDATE servicio SET
                        tipo_servicio
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('tipo_servicio'),
                ));

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function Registrar(servicio $data)
    {
        try
        {
        $sql = "INSERT INTO servicio (id, tipo_servicio)
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'),
                $data->__GET('tipo_servicio'),



                )
            );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
}
}
