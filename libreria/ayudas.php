<?php
function incluirModelos()
{
    $directorio = opendir(RUTA_MODELO);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            require_once RUTA_MODELO . $archivo;
        }
    }
}