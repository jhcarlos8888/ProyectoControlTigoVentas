<div id="bodyForm">
    <form class="form-signin" id="login" method="post" action="<?php url("autenticacion/login")?>">
        <input type="hidden" name="token" value="--Aqui va valor de token">
        <img class="mb-4" src="img/logo_project_control_max.png" alt="" width="200" height="200">
        <h1 class="h3 mb-3 font-weight-normal">Sales Control System</h1>
        <input type="number" id="cedula" name="cedula" class="form-control" placeholder="Usuario" required autofocus minlength="5" maxlength="12">
        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
        <button class="btn btn-lg btn-primary btn-scs btn-block" type="submit" name="boton">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">&copy;2020</p>
    </form>
</div>
