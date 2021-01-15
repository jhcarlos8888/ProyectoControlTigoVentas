<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Cliente</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>

<body>

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">

    <div class="row">

        <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

        <main role="main" class="col-12 col-md-9 ml-sm-auto  px-md-4 py-md-5 py-2 ">

            <div class="text-center">

                <img class="mb-4 img-fluid" src="<?php assets("img/user_bussines.png") ?>" alt="" width="100" height="100">

                <h3>ACTUALIZAR CLIENTE</h3>

            </div>

            <form class="form " id="login" method="post" action="<?php url("cliente/actualizar") ?>">
                <input type="hidden" name="proceso" value="login"><!--Aqui debe ir un token-->
                <input type="hidden" name="id" value="<?= $cliente->__get("id")?>">

                <div class=" form-group row offset-md-2 my-0">
                    <div class="col-md-3">
                        <label for="identificacion" class="col-form-label my-2">IDENTIFICACIÓN</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="identificacion" id="identificacion"
                               value="<?= $cliente->__get("identificacion") ?>"
                               class="form-control text-center my-2" placeholder="Ingrese cedula del cliente">
                    </div>
                </div>

                <div class=" form-group row offset-md-2 my-0">
                    <div class="col-md-3">
                        <label for="nombre" class="col-form-label my-2">NOMBRE</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="nombre" id="nombre" class="form-control text-center my-2"
                               value="<?= $cliente->__get("nombre")?>"
                               placeholder="Ingrese nombre del cliente">
                    </div>
                </div>

                <div class=" form-group row offset-md-2 my-0">
                    <div class="col-md-3">
                        <label for="celular" class="col-form-label my-2">CELULAR</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="celular" id="celular" class="form-control text-center my-2"
                               value="<?= $cliente->__get("celular")?>"
                               placeholder="Ingrese celular">
                    </div>
                </div>

                <div class=" form-group row offset-md-2 my-0">
                    <div class="col-md-3">
                        <label for="direccion" class="col-form-label my-2">DIRECCION</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="direccion" id="direccion" class="form-control text-center my-2"
                               value="<?= $cliente->__get("direccion")?>"
                               placeholder="Ingrese direccion">
                    </div>
                </div>



                <div class=" form-group row offset-md-2 my-0">
                    <div class="col-md-3">
                        <label for="email" class="col-form-label my-2">E-MAIL</label>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="email" id="email" class="form-control text-center my-2"
                               value="<?= $cliente->__get("email")?>"
                               placeholder="Ingrese e-mail">
                    </div>
                </div>

                <div class="form-group row offset-md-2 my-2 mt-4">
                    <div class="col-md-8 ">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="boton">Actualizar</button>
                    </div>
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
