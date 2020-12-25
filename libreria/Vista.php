<?php namespace vista;

/**
 * Class Vista
 * @package vista
 */
class Vista
{

    /**
     * @param $path
     * @param null $key
     * @param null $valor
     * @return null
     */
    public static function crear($path, $key = null, $valor = null)
    {
        //Validamos la variable path
        if ($path != "") {
            $paths = explode(".", $path); // separamos la ruta en un array con el separador "." (punto)
            $ruta = ""; // la variable almacena la ruta del archivo de la vista
            for ($i = 0; $i < count($paths); $i++) {
                // Validamos si es la ultima parte de la ruta
                if ($i == count($paths) - 1) {
                    // completamos la ruta con ".php"
                    $ruta .= $paths[$i] . ".php";
                } else {
                    //si no es la ultima parte greamos a la ruta un "/"
                    // para separar las partes = carpetas donde esta ubicada el archivos de la vista
                    $ruta .= $paths[$i] . "/";
                }
            }
            // Validamos si el archivo de la vista existe en la ruta recibida
            if (file_exists(RUTA_VISTAS . $ruta)) {

                //Si la vista existe, validamos los parametros enviados
                if (!is_null($key)) {
                    if (is_array($key)) {
                        // Si se envio un array se extrae los keys y los convierte a variables
                        extract($key, EXTR_PREFIX_SAME, "");
                    } else {
                        //Si no es array se crea una variable con el nombre de la key y se asigana el valor recibido
                        //("index","usuario","juan")
                        //$usuario = "juan";
                        ${$key} = $valor;
                    }
                }
                //incluimos la vista enviada
                include RUTA_VISTAS . $ruta;
            } else {
                die("No existe el archivo de la vista");
            }
        }
        return null;
    }
}