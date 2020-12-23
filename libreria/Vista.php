<?php

class Vista
{
    public static function crear($ruta, $clave=null, $valor=null)
    {
        if ($ruta != "") {
            $rutas = explode(".", $ruta); //Se pasa a un array las partes de la ruta separadas por puntos
            $url = "";

            for ($i = 0; $i < count($rutas); $i++) {
                if ($i == count($rutas) - 1) {
                    $url .= $rutas[$i] . ".php"; //a la ultima parte de la lista le agregamos .php

                } else {
                    $url .= $rutas[$i] . "/"; //Se separa las partes de la ruta con /
                }
            }

            if(file_exists(RUTA_VISTAS . $url)){

                if(!is_null($clave)){
                    if(is_array($clave)){
                        extract($clave,EXTR_PREFIX_SAME,"");
                    }
                }else{
                    ${$clave} = $valor;
                }
                include RUTA_VISTAS.$url;

            }else{
                echo "No existe la vista";  // Redireccionar a una vista de pagina no encontrada 404
            }

        } else {
            echo "No existe la vista";  // Redireccionar a una vista de pagina no encontrada 404
        }
    }
}