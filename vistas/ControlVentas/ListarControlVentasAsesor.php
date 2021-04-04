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
                    <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                        <div class="input-group">
                            <input type="text" id="busqueda" placeholder="Buscar Control Ventas" class="form-control" data-generator="ControlVentasAsesor"
                                   aria-label="Text input with segmented dropdown button">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary">
                                    <span data-feather="search"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 order-3 table-responsive">
                        <table id="ListaControlVentasAsesor" class="table table-hover" aria-label="Listado de Control de Ventas del Asesor">
                            <thead>
                                <tr>
                                    <th scope="col">OFERTA</th>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">SERVICIO</th>
                                    <th scope="col">ESTADO</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">N° DE INSTALACION</th>
                                    <th scope="col">ASESOR</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTable">
                                <?php if (isset($listaControlVentas)) {
                                    for ($i = 0; $i < count($listaControlVentas); $i++) {
                                ?>
                                    <tr>
                                        <td><a href="<?php url("control_ventas/ControlVentas/".$listaControlVentas[$i]->getOferta()) ?>"><?= $listaControlVentas[$i]->getOferta(); ?></a></td>
                                        <td><?= $listaControlVentas[$i]->getCliente()->__get("nombre"); ?></td>
                                        <td><?= $listaControlVentas[$i]->getServicio()->getTipoServicio(); ?></td>
                                        <td><?= $listaControlVentas[$i]->getEstado()->getEstado() ?></td>
                                        <td><?= $listaControlVentas[$i]->getFecha(); ?></td>
                                        <td><?= $listaControlVentas[$i]->getNumeroOrdenInstalacion(); ?></td>
                                        <td><?= $listaControlVentas[$i]->getUsuario()->__get("nombre"); ?></td>
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
