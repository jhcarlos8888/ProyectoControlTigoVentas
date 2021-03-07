<!DOCTYPE html>
<html lang="es">
<head>
    <title>Subir Manual</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>

<body>

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">

    <div class="row">
        <?php include(RUTA_VISTAS . 'partes/menu.php') ?>
        <main role="main" class="col-12 col-md-10 px-md-4 py-md-5 py-2">

            <div class="text-center offset-md-2">
                <h3 class="alert-secondary col-md-10 mt-3">Agregar Volantes</h3>
            </div>

            <form class="offset-md-2" method="post" action="<?php url("volante/crear") ?>"
                  enctype="multipart/form-data">

                <div class="form-row my-5">
                    <div class="col-md-10">
                        <label for="nombre"></label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                               placeholder="Ingrese el nombre del Volante"
                               required>
                    </div>
                </div>

                <div class="custom-file col-md-10 mb-5">
                    <input type="file" class="custom-file-input" id="volante" name="volante" lang="es" required
                           data-generator="archivo">
                    <label class="custom-file-label" for="volante">Seleccionar Archivo</label>
                </div>

                <button type="submit" class="btn btn-primary col-md-10">Cargar Volante</button>

            </form>

            <footer class="row offset-md-2 text-center">
                <p class="mt-5 mb-3 text-muted col-md-10">&copy;2020</p>
            </footer>

        </main>
    </div>
</div>

<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>
