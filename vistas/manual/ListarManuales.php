<!DOCTYPE html>

<html lang="es">

<head>
    <title>Manuales</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>

</head>

<body>
<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">
    <div class="row">
        <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

        <main role="main" class="col-12 col-md-10 px-md-4 py-md-5 py-2">
            <div class="row">
                <div class="col-md-4 py-md-3 py-2 order-2 order-md-1">
                    <a class="btn btn-primary w-100" href="<?php url("manuales/cargar") ?>"
                       role="button">Subir Manual</a>
                </div>
                <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                <a href="<?php assets("manuales/reglamento_del_aprendiz.pdf");?>">Reglamento del Aprendiz</a>

                </div>
            </div>
        </main>

    </div>
</div>

<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>