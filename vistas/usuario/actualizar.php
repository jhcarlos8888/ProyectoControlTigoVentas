<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar Usuario</title>
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
                        <h3 class="alert-secondary">ACTUALIZAR USUARIO</h3>
                    </div>

                    <form class="row" id="registrar" method="post" action="<?php url("usuario/actualizar") ?>">

                        <input type="hidden" name="proceso" value="registrar"><!--Aqui debe ir un token-->
                        <input type="hidden" name="id" value="<?= $usuario->__get("id_usuario")?>">

                        <div class="col-md-6">
                            <label for="nombre" class="col-form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control text-capitalize"
                                   value="<?= $usuario->__get("nombre")?>" placeholder="Ingrese Nombre Completo" required>
                        </div>

                        <div class="col-md-6">
                            <label for="identificacion" class="col-form-label">Identificacion</label>
                            <input type="text" name="identificacion" id="identificacion"  class="form-control"
                                   value="<?= $usuario->__get("identificacion") ?>" placeholder="Ingrese Cedula" required>
                        </div>

                        <div class="col-md-6">
                            <label for="contrasena" class="col-form-label">Contraseña</label>
                            <input type="password" name="contrasena" id="contrasena" value="<?= $usuario->__get("contrasena")?>" class="form-control"
                                   placeholder="Ingrese Contraseña" required>
                        </div>

                        <div class="col-md-6">
                            <label for="repite-contrasena" class="col-form-label">Repite-Contraseña</label>
                            <input type="password" name="repite-contrasena" id="repite-contrasena" value="<?= $usuario->__get("contrasena")?>" class="form-control"
                                   placeholder="Repita Contraseña" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" name="email" id="email" value="<?= $usuario->__get("email")?>" class="form-control" placeholder="Ingrese Correo"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="celular" class="col-form-label">Celular</label>
                            <input type="tel" name="celular" id="celular" value="<?= $usuario->__get("celular")?>" class="form-control" placeholder="Ingrese Celular"
                                   pattern="[0-9]{7-10}" minlength="7" maxlength="10" title="Debe contener minimo 7 digitos, maximo 10">
                        </div>

                        <div class="col-md-4">
                            <label for="usuario" class="col-form-label">Usuario</label>
                            <input type="text" name="usuario" id="usuario" value="<?= $usuario->__get("usuario")?>" class="form-control" placeholder="Ingrese Usuario"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label for="sede" class="col-form-label">Sede</label>
                            <select name="sede" id="sede" class="form-control" required aria-required="true">
                                <option value="">Seleecione una sede</option>
                                <?php foreach ($sedes as $key => $sede) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $sede ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="rol" class="col-form-label">Rol</label>
                            <select name="rol" id="rol" class="form-control" required aria-required="true">
                                <option value="">Seleecione un Rol</option>
                                <?php foreach ($roles as $key => $rol) { ?>
                                    <option value="<?php echo $key ?>"><?php echo $rol ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-8 m-auto pt-4">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
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
