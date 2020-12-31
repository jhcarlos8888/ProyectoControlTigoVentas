<div id="bodyForm">
    <form class="form-signin" id="login" method="post" action="usuario/loguin" >
        <input type="hidden" name="proceso" value="login">
        <img class="mb-4" src="img/logo_project_control_max.png" alt="" width="200" height="200">
        <h1 class="h3 mb-3 font-weight-normal">Sales Control System</h1>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Recuérdame
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="boton">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">&copy;2020</p>
    </form>
</div>
