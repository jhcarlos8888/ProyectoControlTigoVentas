<!-- Barra de las tablas -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#datos-basicos">Datos Basicos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#cambiar-contrasena">Cambiar Contraseña</a>
    </li>
</ul>

<!-- Panel de las tablas -->
<div class="tab-content">
    <div class="tab-pane container active" id="datos-basicos">
        <form class="row" id="registrar" method="post" action="<?php url("usuario/actualizar") ?>">

            <input type="hidden" name="proceso" value="registrar"><!--Aqui debe ir un token-->
            <input type="hidden" name="id" value="<?= $usuario->__get("id_usuario") ?>">

            <div class="col-md-6">
                <label for="nombre" class="col-form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control text-capitalize"
                       value="<?= $usuario->__get("nombre") ?>" placeholder="Ingrese Nombre Completo" required>
            </div>
            <div class="col-md-6">
                <label for="identificacion" class="col-form-label">Identificacion</label>
                <input type="text" name="identificacion" id="identificacion" class="form-control"
                       value="<?= $usuario->__get("identificacion") ?>" placeholder="Ingrese Cedula" required>
            </div>

            <div class="col-md-6">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" name="email" id="email" value="<?= $usuario->__get("email") ?>"
                       class="form-control" placeholder="Ingrese Correo"
                       required>
            </div>
            <div class="col-md-6">
                <label for="celular" class="col-form-label">Celular</label>
                <input type="tel" name="celular" id="celular" value="<?= $usuario->__get("celular") ?>"
                       class="form-control" placeholder="Ingrese Celular"
                       pattern="[0-9]{7-10}" minlength="7" maxlength="10"
                       title="Debe contener minimo 7 digitos, maximo 10">
            </div>
            <div class="col-md-4">
                <label for="usuario" class="col-form-label">Usuario</label>
                <input type="text" name="usuario" id="usuario" value="<?= $usuario->__get("usuario") ?>"
                       class="form-control" placeholder="Ingrese Usuario"
                       required>
            </div>
            <div class="col-md-4">
                <label for="sede" class="col-form-label">Sede</label>
                <select name="sede" id="sede" class="form-control" required aria-required="true">
                    <?php foreach ($sedes as $sede) { ?>
                        <option value="<?php echo $sede->getId(); ?>"
                            <?php if(($usuario->__get("sede"))->getId() === $sede->getId()) { ?>
                                <?php echo "selected='true'"?>
                            <?php } ?>><?php echo $sede->getNombre(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="rol" class="col-form-label">Rol</label>
                <select name="rol" id="rol" class="form-control" required aria-required="true">
                    <?php foreach ($roles as $rol) { ?>
                        <option value="<?php echo $rol->getId(); ?>"
                            <?php if(($usuario->__get("rol"))->getId() === $rol->getId()) { ?>
                                <?php echo "selected='true'"?>
                            <?php } ?>><?php echo $rol->getNombre(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-8 m-auto pt-4">
                <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            </div>
        </form>
    </div>

    <div class="tab-pane container fade" id="cambiar-contrasena">
        <form class="row" id="registrar" method="post" action="<?php url("usuario/contrasena") ?>">

            <div class="col-md-6">
                <label for="contrasena" class="col-form-label">Nueva Contraseña</label>
                <input type="password" name="contrasena" id="contrasena"
                       class="form-control" placeholder="Ingrese una nueva contraseña" required>
            </div>
            <div class="col-md-6">
                <label for="repite-contrasena" class="col-form-label">Confirme la Contraseña</label>
                <input type="password" name="repite-contrasena" id="repite-contrasena"
                       class="form-control" placeholder="Confirme la nueva Contraseña" required>
            </div>
            <div class="col-md-8 m-auto pt-4">
                <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
            </div>
        </form>
    </div>
</div>
