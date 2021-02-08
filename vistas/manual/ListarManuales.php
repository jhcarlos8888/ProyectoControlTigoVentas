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
            </div>
            <div class="p-2">
                <div class="row ">
                    <?php if (isset($listaDeManuales)) {
                        for ($i = 0; $i < count($listaDeManuales); $i++) {
                            ?>
                            <!--aqui debe ir un bucle que dibuje las tarjetas-->
                            <div class="col-md-4 col-sm-12 ">
                                <div class="card float-left h-100">
                                    <div class="card-header text-center">
                                        <h5 class="card-title"><?php $listaDeManuales[$i] . getNombre(); ?></h5>
                                    </div>
                                    <!-- Body de la tarjeta -->
                                    <div class="card-body">
                                        <img class="card-img-top h-100" src="<?php assets("img/pdf_icon.svg"); ?>"
                                             alt="">
                                    </div>
                                    <!--Pie de la tarjeta-->
                                    <div class="card-footer">
                                        <small class="text-muted pr-2">
                                            <a class="btn btn-md btn-outline-info"
                                               href="<?php url($listaDeManuales[$i] . getRuta()); ?>"
                                               download="<?php $listaDeManuales[$i] . getNombre() ?>">Descargar</a>
                                        </small>
                                        <small class="text-muted">
                                            <a class="btn btn-md btn-outline-success"
                                               href="<?php url($listaDeManuales[$i] . getRuta()); ?>">Visualizar</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <!--aqui cerrara el bucle-->
                </div>
            </div>
        </main>

    </div>
</div>

<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>