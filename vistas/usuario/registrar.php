<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrar Usuario</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>
<body class="text-center">

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">

    <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

    <img class="mb-2"
         src=""
         alt="imagen agregar usuario" width="100" height="100">

    <h3>REGISTRAR USUARIO</h3>

        <form class="form" id="login" method="post" action="<?php url("usuario/crear") ?>">
            <input type="hidden" name="proceso" value="login"><!--Aqui debe ir un token-->

            <div class="form-group row">
                <label for="identificacion" class="col-sm-3 col-form-label">IDENTIFICACION</label>
                <div class="col-sm-5">
                    <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Ingrese cedula del usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-3 col-form-label">NOMBRE</label>
                <div class="col-sm-5">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre">
                </div>
            </div>
            <div class="form-group row">
                <label for="celular" class="col-sm-3 col-form-label">CELULAR</label>
                <div class="col-sm-5">
                    <input type="text" name="celular" id="celular" class="form-control" placeholder="Ingrese celular">
                </div>
            </div>
            <div class="form-group row">
                <label for="usuario" class="col-sm-3 col-form-label">USUARIO</label>
                <div class="col-sm-5">
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese usuario">
                </div>
            </div>
            <div class="form-group row">
                <label for="contrasena" class="col-sm-3 col-form-label">CONTRASEÑA</label>
                <div class="col-sm-5">
                    <input type="text" name="contrasena" id="contrasena" class="form-control" placeholder="Ingrese contraseña">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">EMAIL</label>
                <div class="col-sm-5">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese email">
                </div>
            </div>
            <div class="form-group row">
                <label for="sede" class="col-sm-3 col-form-label">ZONA SEDE</label>
                <div class="col-sm-5">
                    <input type="text" name="sede" id="sede" class="form-control" placeholder="Ingrese sede">
                </div>
            </div>
            <div class="form-group row">
                <label for="rol" class="col-sm-3 col-form-label">ROL</label>
                <div class="col-sm-5">
                    <input type="text" name="rol" id="rol" class="form-control" placeholder="Ingrese rol">
                </div>
            </div>
            <div class="form-group row">
                <div class="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="boton">REGISTRAR</button>
                </div>
            </div>
        </form>
    </div>

<footer>
    <p class="mt-5 mb-3 text-muted">&copy;2020</p>
</footer>

<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>
