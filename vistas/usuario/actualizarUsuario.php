<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Usuario</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>

<body>

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>


<div class="container-fluid">

    <div class="row">

        <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

        <main role="main" class="col-12 col-md-10 px-md-4 py-md-5 py-2">
            <div class="text-center">
                <img class="mb-4 img-fluid" src="<?php assets("img/user_bussines.png") ?>" alt="" width="60"
                     height="60">
                <h3 class="alert-secondary">ACTUALIZAR USUARIO</h3>
            </div>

            <?php include(RUTA_VISTAS . 'usuario/formularioActualizacion.php') ?>

            <footer class="row offset-md-2 text-center">
                <p class="mt-5 mb-3 text-muted col-md-10">&copy;2020</p>
            </footer>

        </main>
    </div>
</div>

<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>
