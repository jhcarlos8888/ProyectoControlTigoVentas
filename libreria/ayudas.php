<?php

define("INDEX","index.php");

//Esta funcion realiza un require_once de todos los archivos contenidos en la carpeta modelo.
function incluirModelos()
{
    $directorio = opendir(RUTA_MODELO);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)&& ($archivo != "." && $archivo != "..")) {
            require_once RUTA_MODELO . $archivo;
        }
    }
}

// La funcion permite enviar una ruta y retornar una url valida para la clase Ruta que recibe la peticion
function url($ruta)
{
    $url = str_replace(INDEX, "", $_SERVER["PHP_SELF"]);
    echo "/" . trim($url, "/") . "/" . $ruta;
}

/* esta funcion nos va a ayudar a retornar un recurso
* - $asset : nombre del archivo que esta dentro de la carpeta publico
* */
function assets($assets)
{
    $url = trim(str_replace(INDEX, "", $_SERVER["PHP_SELF"]), "/");
    echo "/" . $url . "/assets/" . $assets;
}

function validarSession(){
    session_start();
    $valid_session = isset($_SESSION['id']) ? $_SESSION['id'] === session_id() : FALSE;
    if (!$valid_session) {
        redirecciona("");
        exit();
    }
}

function redirecciona($ruta){
    $urlprin = str_replace(INDEX, "", $_SERVER["PHP_SELF"]);
    header("location:/" . trim($urlprin, "/") . "/" . $ruta);
}

function encriptar($password)
{
    return password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
}

function validarEncriptacion($password, $hash): bool
{
    return password_verify($password, $hash);
}