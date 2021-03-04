<!DOCTYPE html>

<html lang="es">

<head>
    <title>FORMULARIO DE SERVICIOS</title>
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
                      <a class="btn btn-primary w-100" href="<?php url("") ?>"
                         role="button">Nuevo Servicio</a>
                      <a class="btn btn-primary w-100" href="<?php url("") ?>"
                            role="button">Cancelar</a>
                  </div>

                  <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                      <div class="input-group">
                          <input type="text" id="busqueda" placeholder="Buscar Cliente" class="form-control" data-generator="Cliente"
                                 aria-label="Text input with segmented dropdown button">
                          <div class="input-group-append">
                              <button type="button" class="btn btn-outline-secondary">
                                  <span data-feather="filter"></span>
                              </button>
                              <button type="button"
                                      class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Cedula</a>
                                  <a class="dropdown-item" href="#">servicios</a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col-12 order-3 table-responsive">

                      <table id="UserList" class="table table-hover" id="tblServices" aria-label="Lista de Servicios">
                          <thead>
                              <tr>
                                  <th scope="col">SERVICIOS</th>
                                  <th scope="col">NOMBRE</th>
                                  <th scope="col">ESTADO</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTable">
                                <?php if (isset($servicio)) {
                                    for ($i = 0; $i < count($servicio); $i++) {
                                        ?>
                                        <tr>
                                            <td><?= $servicio[$i]->__get("servicio"); ?></td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include(RUTA_VISTAS . 'partes/scripts.php') ?>

  </body>
  </html>
