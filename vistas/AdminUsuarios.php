<!DOCTYPE html>

<html lang="es">

<?php require_once('../partes/head.php'); ?>

<body>

<?php require_once('../partes/cabecera.php'); ?>

<div class="container-fluid">
    <div class="row">

        <?php require_once('../partes/menu.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-md-5 py-2">
            <div class="row text-center">
                <div class="col-md-4 py-md-3 py-2 order-2 order-md-1">
                    <button type="button" class="btn btn-primary w-100">Nuevo Usuario</button>
                </div>
                <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                    <div class="input-group">
                        <input type="text" placeholder="Buscar Usuario" class="form-control"
                               aria-label="Text input with segmented dropdown button">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary"><span data-feather="filter"></span>
                            </button>
                            <button type="button"
                                    class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Cedula</a>
                                <a class="dropdown-item" href="#">Cuenta</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 order-3 table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Identificacion</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Zona Sede</th>
                                <th scope="col">Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        ?>

                        <tr>
                            <th scope="row">1053836643</th>
                            <td>Juan Carlos</td>
                            <td>3104037717</td>
                            <td>748925</td>
                            <td>Activo</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<?php require_once('../partes/scripts.php'); ?>

</body>
</html>