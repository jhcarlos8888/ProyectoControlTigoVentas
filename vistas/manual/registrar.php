<!DOCTYPE html>
<html lang="es">
<head>
    <title>Subir manual</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>

<body>

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">

    <div class="row">

        <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

        <main role="main" class="col-12 col-md-10 px-md-4 py-md-5 py-2">

          <div class="text-center offset-md-2">

              <h3 class="alert-secondary col-md-10 mt-3">Gestión de manuales</h3>
          </div>


          <form class="offset-md-2">

            <div class="form-row my-5">
              <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Ingrese el nombre del manual">
              </div>
            </div>

            <div class="form-row mb-5">
                <div class="custom-file col-md-10">
                <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
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
