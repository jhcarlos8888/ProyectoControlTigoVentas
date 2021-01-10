<?php

class Ruta
{
    private array $controladores = array();

    /**
     * @param $listaControladores
     */
    public function controladores($listaControladores
    ) //recibe lo lista de controladores con sus respectivas rutas del archivo rutas.php
    {
        $this->controladores = $listaControladores;

        //Se llama funcion que procesara las rutas recibidas
        self::submit();
    }

    //Esta funcion que se ejecuta cada vez que se envia la peticion desde el navegador
    public function submit()
    {
        $url = isset($_GET["uri"]) ? $_GET["uri"] : "/"; // Se recupera la url de la peticion
        $partesUrl = explode("/", $url); // Se divide la url en partes por el separador "/" y forma un array

        // Se busca si la ruta de la peticion tiene corresponde a uno de los controladores recibidos de rutas.php

        if ($url == "/") {  //Validamos si es raiz o ruta principal

            // buscando si existe la ruta (/) en el array de $controladores
            $resultado = array_key_exists("/", $this->controladores);

            // Si hay resultados comprobando el array para obtener el nombre del controlador de la ruta
            if ($resultado != "" && $resultado == 1) {

                $controlador = "";

                foreach ($this->controladores as $ruta => $controller) {

                    if ($ruta == "/") {
                        $controlador = $controller; // asignamos a el nombre del controlador a la variable
                    }
                }
                $this->getController("index", $controlador); // Se llama funcion que recupera el controlador
            } else {
                die("No existe la ruta principal o raiz, no fue definida en las rutas");
            }

            // Si la ruta no es el index o raiz del proyecto validamos la ruta recibida
        } else {

            $estadoRuta = false;

            foreach ($this->controladores as $ruta => $controller) {

                if (trim($ruta, "/") != "") {
                    $pos = strpos($url, trim($ruta, "/"));

                    if ($pos === false) {
                        echo "";
                    } else {
                        $listaParametros = array(); //array donde se guardaran los parametros de la web
                        $estadoRuta = true;
                        $controlador = $controller;
                        $funcion = "";
                        $cantidadRuta = count(explode("/", trim($ruta, "/")));
                        $cantidadPartesUrl = count($partesUrl);

                        if ($cantidadPartesUrl > $cantidadRuta) {
                            $funcion = $partesUrl[$cantidadRuta];
                            for ($i = 0; $i < count($partesUrl); $i++) {
                                if ($i > $cantidadRuta) {
                                    $listaParametros[] = $partesUrl[$i];
                                }
                            }
                        }
                        $this->getController($funcion, $controlador, $listaParametros);
                    }
                }
            }

            if ($estadoRuta == false) {
                die("Error en la ruta recibida");
            }
        }
    }

    /**
     * @param $funcion
     * @param $controlador
     * @param null $params
     */
    public function getController($funcion, $controlador, $params = null)
    {

        // comprobamos si es index o no la funcion del controlador

        if ($funcion == "index" || $funcion == "" || is_null($funcion)) {
            $functionOfController = "index";
        } else {
            $functionOfController = $funcion;
        }
        // incluimos el controlador a ruta
        $this->incluirControlador($controlador);
        //comprobamos si existe una clase con el mismo nombre del controlador
        if (class_exists($controlador)) {
            //creamos una clase temporal en base la variable controlador
            //ejemplo: $clasetemporal = new ControladorModelo();
            $ClaseTemporal = new $controlador();

            //comprobamos si la clase del controlador creado contiene la funcion recibida.
            if (is_callable(array($ClaseTemporal, $functionOfController))) {
                //llamamos a la funcion de recibida de esa clase
                if ($functionOfController == "index") {
                    //si la funcion es index no se deben recibir parametros
                    if (count($params) == 0) {
                        $ClaseTemporal->$functionOfController();
                    } else {
                        die("Error en parametros recibidos");
                    }
                } else {
                    call_user_func_array(array($ClaseTemporal, $functionOfController), $params);
                }
            } else {
                die("No existe la funcion declara en el controlador");
            }
        } else {
            die("No existe el controlador");
        }
    }

    /**
     * @param $controlador
     */
    public function incluirControlador($controlador)
    {
        // validando si existe la clase con nombre del controlador en la carpeta de controladores o no
        if (file_exists(RUTA_CONTROLADORES . $controlador . ".php")) {
            // si existe el archivo lo incluimos
            include(RUTA_CONTROLADORES . $controlador . ".php");
        } else {
            die("No se encontro el archivo del controlador");
        }
    }
}
