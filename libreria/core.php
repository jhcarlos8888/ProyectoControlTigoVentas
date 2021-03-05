<?php


// Se define ruta de aplicacion
define("RUTA_APLICACION", RUTA_BASE . "aplicacion/");

//Se defina ruta de las vistas
define("RUTA_VISTAS", RUTA_BASE . "vistas/");

//Se defina ruta librerias
define("LIBRERIA", RUTA_BASE . "libreria/");

//Se define la ruta de la carpeta rutas
define("RUTA", RUTA_APLICACION . "rutas/");

//Se define la ruta de la carpeta modelo
define("RUTA_MODELO",RUTA_APLICACION . "modelo/");

//Se define la ruta de la carpeta de controladores
define("RUTA_CONTROLADORES", RUTA_APLICACION . "controladores/");

require_once ("validaciones.php");
require_once ("ayudas.php");
incluirModelos();
require_once (RUTA_APLICACION."configuracion/configuracion.php");
require_once (RUTA_APLICACION."utilidades/Conexion.php");
require_once ("Vista.php");
include_once "Ruta.php";
include_once RUTA . "rutas.php";