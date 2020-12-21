<?php

require __DIR__ . '/../utilidades/conexion.php';

class Usuario
{
    private $id_usuario, $identificacion, $nombre, $usuario, $contrasena, $email, $celular, $zona_sede, $rol;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
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

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol): void
    {
        $this->rol = $rol;
    }

    public function EliminarUsuario(){

        $query = "delete from usuario where id_usuario=$this->id_usuario";
    }

    public function CrearUsuario(){

    }

    public function ConsultarUsuario($email){

        $cnx = new Conexion();
        $cnx->CrearConexion();

        $query = "SELECT * FROM usuario WHERE email = '$email'";

        $usuario = mysqli_query($cnx->getCon(),$query);

        if (!$usuario){

            $cnx->CerrarConexion();
            //die("Error en la consulta ". mysqli_error($this->con));
            return false;
        }
        else{
            while ($fila = mysqli_fetch_array($usuario)) {

                $this->setIdUsuario($fila['id']);
                $this->setIdentificacion($fila['identificacion']);
                $this->setNombre($fila['nombre']);
                $this->setCelular($fila['celular']);
                $this->setUsuario($fila['usuario']);
                $this->setContrasena($fila['contrasena']);
                $this->setEmail($fila['email']);
                $this->setZonaSede($fila['fk_zona_sede']);
                $this->setRol($fila['fk_rol']);
            }
            $cnx->CerrarConexion();
            return true;
        }
    }
}