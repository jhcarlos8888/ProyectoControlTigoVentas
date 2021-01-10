<?php

function validate($input,...$validaciones): bool
{
    $estado = true;

    foreach ($validaciones as $validacion){

        if (!$validacion($input)){
            $estado = false;
        }
    }
    return $estado;
}

function requerido($input): bool
{
    return (!trim($input) == '');
}

function numerico($input): bool
{
    return (is_numeric(trim($input)));
}

function correo($input): bool
{
    return (filter_var($input, FILTER_VALIDATE_EMAIL) === FALSE);
}