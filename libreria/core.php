<?php

// Se define ruta de archivos modelo
define("RUTA_APLICACION",RUTA_BASE."aplicacion/");

//Se defina ruta de las vistas
define("RUTA_VISTAS",RUTA_BASE."vistas/");

//Se define la ruta de la carpeta rutas
define("RUTA",RUTA_APLICACION."rutas/");

//Se define la ruta de la carpeta de controladores
define("RUTA_CONTROLADORES",RUTA_APLICACION."controladores/");

include "Vista.php";
include "Ruta.php";
include RUTA . "rutas.php";