<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrar Cliente</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>

<body>

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">

    <div class="row">

        <?php include(RUTA_VISTAS . 'partes/menu.php') ?>


        <main role="main" class="col-12 col-md-10 px-md-4 py-md-5 py-2">
            <div class="text-center">
                <img class="mb-4 img-fluid" src="<?php assets("img/user_bussines.png") ?>" alt="" width="60"
                     height="60">
                <h3 class="alert-secondary">AGREGAR PRODUCTO</h3>
            </div>

            <form class="row" id="registrar" method="post" action="<?php url("control_ventas/crear") ?>">

                <input type="hidden" name="proceso" value="registrar"><!--Aqui debe ir un token-->

                <div class="col-md-6">
                    <label for="oferta" class="col-form-label">N° OFERTA</label>
                    <input type="text" name="oferta" id="oferta" class="form-control text-capitalize"
                           placeholder="Ingrese N° de Oferta" required>
                </div>

                <div class="col-md-6">
                    <input type="hidden" name="cliente" value="<?= $cliente->__get("id") ?>">
                    <label for="nombre_cliente" class="col-form-label">Cliente</label>
                    <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" disabled required value="<?= $cliente->__get("nombre") ?>">
                </div>


                <div class="col-md-6">
                    <label for="servicio" class="col-form-label">Servicio</label>
                    <select name="servicio" id="servicio" class="form-control" required aria-required="true">
                        <option value="">Selecione Servicio</option>
                        <?php foreach ($listaServicios as $servicio) { ?>
                            <option value="<?php echo $servicio->getIdServicio(); ?>"><?php echo $servicio->getTipoServicio(); ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="estado" class="col-form-label">Estado</label>
                    <select name="estado" id="estado" class="form-control" required aria-required="true">
                        <?php foreach ($listaEstados as $estado) { ?>
                            <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getEstado(); ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="orden_instalacion" class="col-form-label">Orden de Instalacion</label>
                    <input type="text" name="orden_instalacion" id="orden_instalacion" class="form-control" required>
                </div>

                <div class="col-md-8 m-auto pt-4">
                    <button type="submit" class="btn btn-primary btn-block">Agregar</button>
                </div>

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