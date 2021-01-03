<?php

namespace usuario;

use Conexion;
use PDO;

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

    public function CrearUsuario()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("INSERT INTO usuario (identificacion, nombre, celular, usuario, contrasena, email, fk_zona_sede, fk_rol) VALUES (:identificacion,:nombre, :celular, :usuario, :contrasena, :email, :sede, :rol)");

        $identificacion = self::getIdentificacion();
        $nombre = self::getNombre();
        $celular = self::getCelular();
        $usuario = self::getUsuario();
        $contrasena = self::getContrasena();
        $email = self::getEmail();
        $sede = self::getZonaSede();
        $rol = self::getRol();

        $stmt->bindValue(':identificacion', $identificacion);
        $stmt->bindValue(":nombre", $nombre);
        $stmt->bindValue(":celular", $celular);
        $stmt->bindValue(":usuario", $usuario);
        $stmt->bindValue(":contrasena", $contrasena);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":sede", $sede, PDO::PARAM_INT);
        $stmt->bindValue(":rol", $rol, PDO::PARAM_INT);

        return $stmt->execute();

        /*if ($stmt->execute()) {
            self::setIdUsuario($conexion->lastInsertId());
            return true;
        }
        else{
            return false;
        }*/
    }

    public function ConsultarUsuario($id)
    {
        $conexionDataBase = new Conexion();
        $usuario = new Usuario();

        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {

            $fila = $stmt->fetch();
            $usuario->setIdUsuario($fila->id);
            $usuario->setIdentificacion($fila->identificacion);
            $usuario->setNombre($fila->nombre);
            $usuario->setCelular($fila->celular);
            $usuario->setUsuario($fila->usuario);
            $usuario->setContrasena($fila->contrasena);
            $usuario->setEmail($fila->email);
            $usuario->setZonaSede($fila->fk_zona_sede);
            $usuario->setRol($fila->fk_rol);
        } else {
            $usuario = null;
        }

        $conexionDataBase->CerrarConexion();

        return $usuario;
    }

    public function ActualizarUsuario()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("UPDATE usuario SET identificacion=:identificacion, nombre=:nombre, celular=:celular, usuario=:usuario, contrasena=:contrasena, email=:email, fk_zona_sede=:sede, fk_rol=:rol WHERE id=:id");

        $id = self::getIdUsuario();
        $identificacion = self::getIdentificacion();
        $nombre = self::getNombre();
        $celular = self::getCelular();
        $usuario = self::getUsuario();
        $contrasena = self::getContrasena();
        $email = self::getEmail();
        $sede = self::getZonaSede();
        $rol = self::getRol();

        $stmt->bindValue(':id', $id,PDO::PARAM_INT);
        $stmt->bindValue(':identificacion', $identificacion);
        $stmt->bindValue(":nombre", $nombre);
        $stmt->bindValue(":celular", $celular);
        $stmt->bindValue(":usuario", $usuario);
        $stmt->bindValue(":contrasena", $contrasena);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":sede", $sede, PDO::PARAM_INT);
        $stmt->bindValue(":rol", $rol, PDO::PARAM_INT);

        $stmt->execute();

        $conexionDataBase->CerrarConexion();

        return($stmt->rowCount() > 0);
    }

    public function EliminarUsuario($id)
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("DELETE FROM usuario WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $resultado = $stmt->execute();
        $conexionDataBase->CerrarConexion();

        return $resultado;
    }

    public function ListarUsuarios()
    {

        $listaUsuarios = array();

        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT * FROM usuario");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {

            $usuario = new Usuario();

            $usuario->setIdUsuario($fila->id);
            $usuario->setIdentificacion($fila->identificacion);
            $usuario->setNombre($fila->nombre);
            $usuario->setCelular($fila->celular);
            $usuario->setUsuario($fila->usuario);
            $usuario->setEmail($fila->email);
            $usuario->setZonaSede($fila->fk_zona_sede);
            $usuario->setRol($fila->fk_rol);

            $listaUsuarios[] = $usuario;
        }

        return $listaUsuarios;
    }

    public function LoguearUsuario($cedula, $contrasena)
    {
        $conexionDataBase = new Conexion();

        $conexion = $conexionDataBase->CrearConexion();

        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE identificacion=:cedula AND contrasena=:contrasena");
        $stmt->bindParam(":cedula", $cedula);
        $stmt->bindParam(":contrasena", $contrasena);
        $stmt->execute();

        $conexionDataBase->CerrarConexion();

        return $stmt->rowCount() == 1;
    }
}