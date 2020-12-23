<?php
    session_start();

    if (isset($_SESSION['nombre_user'])) {
        $nombre_user = $_SESSION['nombre_user'];
    } else {
        header("Location: index.php");
    }

    $nombre_user = $_SESSION['nombre_user'];
?>

<div id="user-register" class="d-flex justify-content-end">
    <div class="p-2">Bienvenido:</div>
    <div id="name-user-register" class="p-2"><?= $nombre_user ?></div>
</div>
<nav class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-8 text-center " href="#"><img src="../../img/tigo-logo-11.png" width="50"
                                                                                   alt=""> TIGO CONTROL</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form method="post" action="controladores/controlador.php">
                <input type="hidden" name="proceso" value="logout">
                <button type="submit" class="btn btn-light">Cerrar Sesión</button>
            </form>
        </li>
    </ul>
</nav>
