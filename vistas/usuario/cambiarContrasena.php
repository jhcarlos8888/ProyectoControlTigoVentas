<form class="row" id="actualizarContrasena" method="post" action="<?php url("usuario/CambiarContrasena") ?>">
    <input type="hidden" name="id" value="<?= $usuario->__get("id_usuario") ?>">
    <div class="col-md-6">
        <label for="contrasena" class="col-form-label">Nueva Contraseña</label>
        <input type="password" name="contrasena" id="contrasena"
               class="form-control" placeholder="Ingrese una nueva contraseña" required>
    </div>
    <div class="col-md-6">
        <label for="validacionContrasena" class="col-form-label">Confirme la Contraseña</label>
        <input type="password" name="validacionContrasena" id="validacionContrasena"
               class="form-control" placeholder="Confirme la nueva Contraseña" required>
    </div>
    <div class="col-md-6 m-auto pt-4">
        <button type="submit" class="btn btn-primary btn-block">Cambiar</button>
    </div>
</form>