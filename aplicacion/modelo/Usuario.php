<?php

namespace usuario;

use Conexion;
use PDO;

class Usuario
{
    private $id_usuario;
    private $identificacion;
    private $nombre;
    private $usuario;
    private $contrasena;
    private $email;
    private $celular;
    private $zona_sede;
    private $rol;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {

    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function CrearUsuario()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("INSERT INTO usuario (identificacion, nombre, celular, usuario, contrasena, email, fk_zona_sede, fk_rol) VALUES (:identificacion,:nombre, :celular, :usuario, :contrasena, :email, :sede, :rol)");

        $stmt = $this->agregarParametros($stmt);

        return $stmt->execute();
    }

    public function ConsultarUsuario($id)
    {
        $conexionDataBase = new Conexion();
        $user = new Usuario();

        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {

            $fila = $stmt->fetch();
            $user->__set("id_usuario",$fila->id);
            $user->__set("identificacion",$fila->identificacion);
            $user->__set("nombre",$fila->nombre);
            $user->__set("celular",$fila->celular);
            $user->__set("usuario",$fila->usuario);
            $user->__set("contrasena",$fila->contrasena);
            $user->__set("email",$fila->email);
            $user->__set("zona_sede",$fila->fk_zona_sede);
            $user->__set("rol",$fila->fk_rol);
        } else {
            $user = null;
        }

        $conexionDataBase->CerrarConexion();

        return $user;
    }

    public function ActualizarUsuario()
    {
        $conexionDataBase = new Conexion();
        $conexion = $conexionDataBase->CrearConexion();
        $stmt = $conexion->prepare("UPDATE usuario SET identificacion=:identificacion, nombre=:nombre, celular=:celular, usuario=:usuario, contrasena=:contrasena, email=:email, fk_zona_sede=:sede, fk_rol=:rol WHERE id=:id");

        $stmt->bindValue(':id', $this->id_usuario, PDO::PARAM_INT);
        $this->agregarParametros($stmt);

        $stmt->execute();

        $conexionDataBase->CerrarConexion();

        return ($stmt->rowCount() > 0);
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

            $user = new Usuario();

            $user->__set("id_usuario", $fila->id);
            $user->__set("identificacion", $fila->identificacion);
            $user->__set("nombre", $fila->nombre);
            $user->__set("celular", $fila->celular);
            $user->__set("usuario", $fila->usuario);
            $user->__set("email", $fila->email);
            $user->__set("zona_sede", $fila->fk_zona_sede);
            $user->__set("rol", $fila->fk_rol);

            $listaUsuarios[] = $user;
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
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        $conexionDataBase->CerrarConexion();

        if ($stmt->rowCount() == 1) {

            $fila = $stmt->fetch();

            $this->id_usuario = $fila->id;
            $this->identificacion = $fila->identificacion;
            $this->nombre = $fila->nombre;
            $this->celular = $fila->celular;
            $this->usuario = $fila->usuario;
            $this->contrasena = $fila->contrasena;
            $this->email = $fila->email;
            $this->zona_sede = $fila->fk_zona_sede;
            $this->rol = $fila->fk_rol;

            return true;

        } else {

            return false;
        }
    }

    public function Buscar(string $valor)
    {

        $usuarios = array();

        $conexionDataBase = new Conexion();

        $conexion = $conexionDataBase->CrearConexion();

        $valor = $valor . "%";
        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE identificacion LIKE :cedula OR nombre LIKE :nombre");
        $stmt->bindParam(":cedula", $valor);
        $stmt->bindParam(":nombre", $valor);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while ($fila = $stmt->fetch()) {
            $user = array(
                "id" => $fila->id,
                "identificacion" => $fila->identificacion,
                "nombre" => $fila->nombre,
                "celular" => $fila->celular,
                "usuario" => $fila->usuario,
                "email" => $fila->email,
                "sede" => $fila->fk_zona_sede,
                "rol" => $fila->fk_rol,
            );

            $usuarios[] = $user;
        }

        $conexionDataBase->CerrarConexion();

        return $usuarios;
    }

    private function agregarParametros($stmt)
    {
        $stmt->bindValue(":identificacion", $this->identificacion);
        $stmt->bindValue(":nombre", $this->nombre);
        $stmt->bindValue(":celular", $this->celular);
        $stmt->bindValue(":usuario", $this->usuario);
        $stmt->bindValue(":contrasena", $this->contrasena);
        $stmt->bindValue(":email", $this->email);
        $stmt->bindValue(":sede", $this->zona_sede, PDO::PARAM_INT);
        $stmt->bindValue(":rol", $this->rol, PDO::PARAM_INT);

        return $stmt;
    }
}