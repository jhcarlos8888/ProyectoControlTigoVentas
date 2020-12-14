<?php


class Servicio
{
    private $id_servicio;
    private $tipo_servicio;

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
}