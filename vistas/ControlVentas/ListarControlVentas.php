<!DOCTYPE html>

<html lang="es">

<head>
    <title>Lista de Control de Ventas</title>
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
                        <a class="btn btn-primary w-100" href="<?php url("control_ventas/actualizarCV") ?>"
                           role="button">Crear Nuevo Servicio</a>
                    </div>

                    <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                        <div class="input-group">
                            <input type="text" id="busqueda" placeholder="Buscar Servicio" class="form-control" data-generator="ControlVentas"
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
                                    <a class="dropdown-item" href="#">Servicio</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 order-3 table-responsive">

                        <table id="VentasList" class="table table-hover" id="tblVentas" aria-label="Lista de Ventas">
                            <thead>
                                <tr>
                                    <th scope="col">OFERTA</th>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">SERVICIO</th>
                                    <th scope="col">ESTADO</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">N° DE INSTALACION</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTable">
                                <?php if (isset($listarControlVentas)) {
                                    for ($i = 0; $i < count($listarControlVentas); $i++) {
                                        ?>
                                        <tr>
                                            <td><?= $listarControlVentas[$i]->__get("oferta"); ?></td>
                                            <td><a href="<?php url("control_ventas/ControlVentas/" .$listarControlVentas[$i]->__get("oferta")) ?>"
                                              <span><?= $listarControlVentas[$i]->__get("cliente"); ?></span></a></td>
                                            <td><?= $listarControlVentas[$i]->__get("servicio"); ?></td>
                                            <td><?= $listarControlVentas[$i]->__get("estado"); ?></td>
                                            <td><?= $listarControlVentas[$i]->__get("fecha"); ?></td>
                                            <td><?= $listarControlVentas[$i]->__get("numero_orden_instalacion"); ?></td>
                                            <td>
                                                <a href="<?php url("control_ventas/editar/" . $listarControlVentas[$i]->__get("id_ventas")) ?>"
                                                   class="bnt"><span data-feather="edit-3"></span></a>
                                                <a href="<?php url("control_ventas/eliminar/" . $listarControlVentas[$i]->__get("id_ventas")) ?>"
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
