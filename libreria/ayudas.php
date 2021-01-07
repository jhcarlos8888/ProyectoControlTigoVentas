<?php

//Esta funcion realiza un require_once de todos los archivos contenidos en la carpeta modelo.
function incluirModelos()
{
    $directorio = opendir(RUTA_MODELO);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            require_once RUTA_MODELO . $archivo;
        }
    }
}

// La funcion permite enviar una ruta y retornar una url valida para la clase Ruta que recibe la peticion
function url($ruta)
{
    $url = str_replace("index.php", "", $_SERVER["PHP_SELF"]);
    echo "/" . trim($url, "/") . "/" . $ruta;
}

/* esta funcion nos va a ayudar a retornar un recurso
* - $asset : nombre del archivo que esta dentro de la carpeta publico
* */
function assets($assets)
{
    $url = trim(str_replace("index.php", "", $_SERVER["PHP_SELF"]), "/");
    echo "/" . $url . "/assets/" . $assets;
}