<?php


class ControlVentas
{

    private $id_ventas;
    private $oferta;
    private $asesor;
    private $cliente;
    private $servicio;
    private $estado;
    private $fecha;
    private $numero_orden_instalacion;
    private $pdo;

    /**
     * ControlVentas constructor.
     * @param $id_ventas
     * @param $oferta
     * @param $asesor
     * @param $cliente
     * @param $servicio
     * @param $estado
     * @param $fecha
     * @param $numero_orden_instalacion
     */
    public function __construct(
        $id_ventas,
        $oferta,
        $asesor,
        $cliente,
        $servicio,
        $estado,
        $fecha,
        $numero_orden_instalacion
    ) {
        $this->id_ventas = $id_ventas;
        $this->oferta = $oferta;
        $this->asesor = $asesor;
        $this->cliente = $cliente;
        $this->servicio = $servicio;
        $this->estado = $estado;
        $this->fecha = $fecha;
        $this->numero_orden_instalacion = $numero_orden_instalacion;
    }

    /**
     * @return mixed
     */
    public function getIdVentas()
    {
        return $this->id_ventas;
    }

    /**
     * @param mixed $id_ventas
     */
    public function setIdVentas($id_ventas): void
    {
        $this->id_ventas = $id_ventas;
    }

    /**
     * @return mixed
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * @param mixed $oferta
     */
    public function setOferta($oferta): void
    {
        $this->oferta = $oferta;
    }

    /**
     * @return mixed
     */
    public function getAsesor()
    {
        return $this->asesor;
    }

    /**
     * @param mixed $asesor
     */
    public function setAsesor($asesor): void
    {
        $this->asesor = $asesor;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param mixed $servicio
     */
    public function setServicio($servicio): void
    {
        $this->servicio = $servicio;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getNumeroOrdenInstalacion()
    {
        return $this->numero_orden_instalacion;
    }

    /**
     * @param mixed $numero_orden_instalacion
     */
    public function setNumeroOrdenInstalacion($numero_orden_instalacion): void
    {
        $this->numero_orden_instalacion = $numero_orden_instalacion;
    }
    /**
     * crud Class ControlVentas
     */

    public function listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM control_ventas");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $clt = new cvtas();

                $cvtas->__SET('id', $r->id);
                $cvtas->__SET('oferta', $r->oferta);
                $cvtas->__SET('asesor', $r->asesor);
                $cvtas->__SET('cliente', $r->cliente);
                $cvtas->__SET('servicio', $r->servicio);
                $cvtas->__SET('estado', $r->estado);
                $cvtas->__SET('fecha', $r->fecha);
                $cvtas->__SET('numero_orden_instalacion', $r->numero_orden_instalacion);

                $result[] = $cvtas;
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
                      ->prepare("SELECT * FROM control_ventas WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $clt = new cvtas();

            $clt->__SET('id', $r->id);
            $cvtas->__SET('oferta', $r->oferta);
            $cvtas->__SET('asesor', $r->asesor);
            $cvtas->__SET('cliente', $r->cliente);
            $cvtas->__SET('servicio', $r->servicio);
            $cvtas->__SET('estado', $r->estado);
            $cvtas->__SET('fecha', $r->fecha);
            $cvtas->__SET('numero_orden_instalacion', $r->numero_orden_instalacion);

            return $cvtas;
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
                      ->prepare("DELETE FROM control_ventas WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(ControlVentas $data)
    {
        try
        {
            $sql = "UPDATE control_ventas SET
                        oferta
                        asesor         = ?,
                        cliente       = ?,
                        servicio           = ?,
                        estado        = ?,
                        fecha           = ?,
                        numero_orden_instalacion        = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('oferta'),
                    $data->__GET('asesor'),
                    $data->__GET('cliente'),
                    $data->__GET('servicio'),
                    $data->__GET('estado'),
                    $data->__GET('fecha '),
                    $data->__GET('numero_orden_instalacion'),

                ));

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function Registrar(ControlVentas $data)
    {
        try
        {
        $sql = "INSERT INTO control_ventas (id, oferta, asesor,cliente, servicio,estado,fecha,numero_orden_instalacion)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'),
                $data->__GET('oferta'),
                $data->__GET('asesor,'),
                $data->__GET('cliente'),
                $data->__GET('servicio'),
                $data->__GET('estado'),
                $data->__GET('fecha'),
                $data->__GET('numero_orden_instalacion'),


                )
            );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }

}
}
