<?php

//Aqui se encuentran todas las rutas disponibles en nuetro proyecto

$ruta = new Ruta();

$ruta->Controladores(array(
    //agregar aqui las rutas con su controlador que gestionata la peticion
    "/"=>"ControladorPrincipal",
    "/usuario"=>"ControladorUsuario",
    "/cliente"=>"ControladorCliente",
    "/autenticacion"=>"ControladorAutenticacion",
    "/buscar"=>"ControladorBusqueda",
    "/manuales"=>"ControladorManuales",
    "/seguimiento"=>"ControladorSeguimiento",
    "/agregar"=>"ControladorAgregarServicio",
    "/control_ventas"=>"ControladorControlVentas",
));
