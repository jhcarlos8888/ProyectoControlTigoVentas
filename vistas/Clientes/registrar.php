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

        <main role="main" class="col-md-9  ml-sm-auto px-md-4 py-md-4 py-2 ">
            <div class="text-center">
                <img class="mb-4 img-fluid" src="<?php assets("img/user_bussines.png") ?>" alt="" width="60"
                     height="60">
                <h3 class="alert-secondary">REGISTRAR CLIENTE</h3>
            </div>

            <form class="row" id="registrar" method="post" action="<?php url("cliente/crear") ?>">

                <input type="hidden" name="proceso" value="registrar"><!--Aqui debe ir un token-->

                <div class="col-md-6">
                    <label for="nombre" class="col-form-label">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control text-capitalize"
                           placeholder="Ingrese Nombre Completo" required>
                </div>

                <div class="col-md-6">
                    <label for="identificacion" class="col-form-label">Identificacion</label>
                    <input type="number" name="identificacion" id="identificacion" class="form-control"
                           placeholder="Ingrese Cedula" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese Correo"
                           required>
                </div>

                <div class="col-md-6">
                    <label for="celular" class="col-form-label">Celular</label>
                    <input type="tel" name="celular" id="celular" class="form-control" placeholder="Ingrese Celular"
                           pattern="[0-9]{7-10}" minlength="7" maxlength="10" title="Debe contener minimo 7 digitos, maximo 10">
                </div>

                <div class="col-md-6">
                    <label for="direccion" class="col-form-label">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese Direccion"
                           required>
                </div>

                <div class="col-md-8 m-auto pt-4">
                    <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                </div>

            </form>

            <footer class="row offset-md-2 text-center">
                <p class="mt-5 mb-3 text-muted col-md-8">&copy;2020</p>
            </footer>

        </main>
    </div>
</div>

<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>
