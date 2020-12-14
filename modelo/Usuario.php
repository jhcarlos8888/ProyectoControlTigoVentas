<?php


class Usuario
{
    private $id_usuario, $identificacion, $nombre, $usuario, $contrasena, $email, $celular, $zona_sede;

    /**
     * Usuario constructor.
     * @param $id_usuario
     * @param $identificacion
     * @param $nombre
     * @param $usuario
     * @param $contrasena
     * @param $email
     * @param $celular
     * @param $zona_sede
     */
    public function __construct(
        $id_usuario,
        $identificacion,
        $nombre,
        $usuario,
        $contrasena,
        $email,
        $celular,
        $zona_sede
    ) {
        $this->id_usuario = $id_usuario;
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->celular = $celular;
        $this->zona_sede = $zona_sede;
    }


    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena): void
    {
        $this->contrasena = $contrasena;
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
    public function getZonaSede()
    {
        return $this->zona_sede;
    }

    /**
     * @param mixed $zona_sede
     */
    public function setZonaSede($zona_sede): void
    {
        $this->zona_sede = $zona_sede;
    }
}