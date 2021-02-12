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
              <h3 class="alert-secondary col-md-10 mt-3">Gestión de Manuales</h3>
          </div>


          <form class="offset-md-2" method="post" action="<?php url("manuales/crear") ?>" enctype="multipart/form-data">

            <div class="form-row my-5">
              <div class="col-md-10">
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del manual">
              </div>
            </div>

              <input type="file" class="" id="manual" name="manual" lang="es" required>
            <div class="form-row mb-5">
                <div class="col-md-10">
                <label class="custom-file-label" for="manual">Seleccionar Archivo</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary col-md-10">Cargar documento</button>

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
