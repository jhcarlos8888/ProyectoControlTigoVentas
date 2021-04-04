<!DOCTYPE html>

<html lang="es">

<head>
    <title>Volantes</title>
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
                    <a class="btn btn-primary w-100" href="<?php url("volante/subir") ?>"
                       role="button">Subir Volante</a>
                </div>
            </div>
            <div class="p-2">
                <div class="row ">
                    <?php if (isset($listaDeVolantes)) {
                        for ($i = 0; $i < count($listaDeVolantes); $i++) {
                            ?>
                            <!--aqui debe ir un bucle que dibuje las tarjetas-->
                            <div class="col-md-2 mr-md-1">
                                <div class="card float-left h-100">
                                    <div class="card-header text-center">
                                        <h6 class="card-title"><?php echo $listaDeVolantes[$i]->getNombre(); ?></h6>
                                    </div>
                                    <!-- Body de la tarjeta -->
                                    <div class="card-body">
                                        <img class="card-img-top h-100" src="<?php assets("img/pdf_icon.svg"); ?>"
                                             alt="">
                                    </div>
                                    <!--Pie de la tarjeta-->
                                    <div class="card-footer text-center">
                                        <small class="text-muted pr-2">
                                            <a class="btn btn-md btn-outline-info"
                                               href="<?php assets($listaDeVolantes[$i]->getRuta()); ?>"
                                               download="<?php echo $listaDeVolantes[$i]->getNombre() ?>"><span data-feather="download"></span></a>
                                        </small>
                                        <small class="text-muted">
                                            <a class="btn btn-md btn-outline-success"
                                               href="<?php assets($listaDeVolantes[$i]->getRuta()); ?>" target="_blank"><span data-feather="eye"></span></a>
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
