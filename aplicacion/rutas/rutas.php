<?php

//Aqui se encuentran todas las rutas disponibles en nuetro proyecto

$ruta = new Ruta();

$ruta->Controladores(array(
    "/"=>"ControladorPrincipal",
    "/usuario"=>"ControladorUsuario",
    "/prueba"=>"ControladorPrincipal",
    "/cliente"=>"ControladorPrincipal",
));

