<?php

class Ruta
{
    private $controladores = array();

    //Metodo para ingresar controladores con sus respectivas rutas
    public function Controladores($controlador)
    {
        $this->controladores = $controlador;
        self::submit();
    }

    //Esta funcion se ejecuta cada vez que se envia una peticion
    public function submit()
    {

        // Se recupera la url de la peticion
        $uri = isset($_GET['uri']) ? $_GET['uri'] : "/";
        $paths = explode("/", $uri); // Se divide la url por "/" y lo coloca en un array

        if ($uri == "/") {
            // Ruta Principal

            // Validamos si la ruta existe en el array de controladore
            $respuesta = array_key_exists("/", $this->controladores);
            if($respuesta){
            /*if ($respuesta != "" && $respuesta == 1) {*/
                foreach ($this->controladores as $ruta => $controller) {
                    if ($ruta == "/") {

                        $controlador = $controller;
                    }
                }

                $this->getController("index", $controlador); // llamamos al metodo que nos recupera el controlador
            }

        } else {
            //controladores y metodos

            $estado = false;

            foreach ($this->controladores as $ruta => $controller) {

                if (trim($ruta, "/") != "") {

                    $pos = strpos($uri, trim($ruta, "/"));

                    if ($pos === false) {
                        //echo "<small style='color:red;'>no se encontro</small><br>";
                    } else {
                        echo "<small style='color:green;'>se econtro </small><br>";
                        $arrayParams  = array(); //array donde se guardaran los parametros de la web
                        $estado       = true; // estado de ruta
                        $controlador  = $controller;
                        $metodo       = "";
                        $cantidadRuta = count(explode("/", trim($ruta, "/")));
                        $cantidad     = count($paths);
                        if ($cantidad > $cantidadRuta) {
                            $metodo = $paths[$cantidadRuta];
                            for ($i = 0; $i < count($paths); $i++) {
                                if ($i > $cantidadRuta) {
                                    $arrayParams[] = $paths[$i];
                                }
                            }
                        }
                        //echo "<b>Parametros: </b>".json_encode($arrayParams);
                        //echo "<br><b>cantidad Rutas</b>: ".count(explode("/",trim($ruta,"/")))."<br>";
                        //echo "<br><b>cantidad Uris</b>: ".count($paths)."<br>";
                        /*if(count($paths) > 1){
                        $metodo = $paths[1];
                        }*/
                        $this->getController($metodo, $controlador, $arrayParams);

                    }

                    /*if ($pos !== false) {
                        $arrayParams  = array(); //array donde se guardaran los parametros de la web
                        $estado = true; // estado de ruta
                        $controlador = $controller;
                        $metodo = "";
                        $cantidadRuta = count(explode("/", trim($ruta, "/")));
                        $cantidad     = count($paths);
                        if (count($paths) > 1) {
                            $metodo = $paths[1];
                        }
                        $this->getController($metodo, $controlador, $arrayParams);
                    }*/
                }
            }

            if($estado == false) {
                die("Error de ruta");
            }
        }
    }

    private function getController($funcion, $controlador, $parametros = array())
    {
        // comprobamos si la funcion del controlador  es index

        if ($funcion == "index" || $funcion == "" || is_null($funcion)) {
            $funcionController = "index";
        } else {
            $funcionController = $funcion;
        }

        $this->incluirControlador($controlador);

        if (class_exists($controlador)) {

            $claseTemporal = new $controlador();

            if (is_callable(array($claseTemporal, $funcionController))) {

                if ($funcionController == "index") {
                    if (count($parametros) == 0) {
                        $claseTemporal->$funcionController();
                    } else {
                        die("error en parametros");
                    }
                } else {
                call_user_func_array(array($claseTemporal, $funcionController), $parametros);
                }
            } else {
                die("no se existe la clase " . $funcionController);
            }
        } else {
            die("no se existe la clase " . $controlador);
        }
    }

    private function incluirControlador($controlador)
    {
        if (file_exists(RUTA_CONTROLADORES . $controlador . ".php")) {
            include RUTA_CONTROLADORES . $controlador . ".php";
        } else {
            die("Error al encontrar archivo" . $controlador . ".php");
        }
    }
}