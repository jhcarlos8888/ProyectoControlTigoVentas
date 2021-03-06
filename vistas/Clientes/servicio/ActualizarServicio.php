<!DOCTYPE html>

<html lang="es">

<head>
    <title>Seguimiento de Clientes</title>
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
                      <a class="btn btn-primary w-100" href="<?php url("seguimiento/registrar/") ?>"
                         role="button">Añadir producto</a>
                       </br>
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
                                  <th scope="col">TIPO DE PROCESO</th>
                                  <th scope="col">FECHA</th>
                                  <th scope="col">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTableServ">
                              <?php if (isset($Listado)) {
                                  for ($i = 0; $i < count($Listado); $i++) {
                                      ?>
                                      <tr>
                                              <td><?= $Listado[$i]->getServicio()->getTipoServicio; ?></td>
                                              <td><?= $Listado[$i]->getFecha(); ?></td>
                                              <td>
                                              <a href="<?php url("seguimiento/editar/" . $Listado[$i]->getIdVentas()) ?>"
                                                 class="bnt"><span data-feather="edit-3"></span></a>
                                              <a href="<?php url("seguimiento/eliminar/" . $Listado[$i]->getIdVentas()) ?>"
                                                 class="bnt"><span data-feather="trash-2"></span></a>
                                          </td>
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
