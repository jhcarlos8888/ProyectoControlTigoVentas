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

        <main role="main" class="col-12 col-md-10 px-md-4 py-md-2 py-2">
            <div class="row">
                <div class="col-md-4 py-md-3 py-2 order-2 order-md-1">
                    <a class="btn btn-primary w-40"
                       href="<?php url("seguimiento/registrar/" . $cliente->__get("id")) ?>"
                       role="button">Añadir Producto</a>
                    <a class="btn btn-danger w-40" href="<?php url("") ?>"
                       role="button">Regresar</a>
                </div>

                <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                    <div class="input-group">
                        <input type="text" id="busqueda" placeholder="Buscar Cliente" class="form-control"
                               data-generator="seguimiento"
                               aria-label="Text input with segmented dropdown button">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary">
                                <span data-feather="search"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 order-3 table-responsive">

                    <table class="table table-hover" id="tblServices" aria-label="Lista de Servicios">
                        <thead>
                        <tr class="text-center bg-info">
                            <th scope="col" COLSPAN="4"><h4><?= $cliente->__get("nombre") ?></h4></th>
                        </tr>
                        <tr>
                            <th scope="col">TIPO DE PROCESO</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody id="bodyTableServ">
						<?php if (isset($Listado)) {
							for ($i = 0; $i < count($Listado); $i++) {
								?>
                                <tr>
                                    <td><?= $Listado[$i]->getServicio()->getTipoServicio(); ?></td>
                                    <td><?= $Listado[$i]->getFecha(); ?></td>
                                    <td><?= $Listado[$i]->getEstado()->getEstado(); ?></td>
                                    <td>
                                        <a href="#"
                                           class="bnt"><span data-feather="eye"></span></a>
                                        <a href="<?php url("seguimiento/editar/" . $Listado[$i]->getIdVentas()) ?>"
                                           class="bnt"><span data-feather="edit-3"></span></a>
								        <?php if ($rol_usuario === "Administrador" || $rol_usuario === "Coordinador Comercial"){ ?>
                                        <a href="<?php url("control_ventas/eliminar/" . $Listado[$i]->getIdVentas()."/".$cliente->__get("id")) ?>"
                                           class="bnt"><span data-feather="trash-2"></span></a>
								        <?php }?>
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
