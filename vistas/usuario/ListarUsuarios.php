<!DOCTYPE html>

<html lang="es">

<head>
    <title>Lista de Usuarios</title>
    <?php include(RUTA_VISTAS.'partes/head.php') ?>
</head>


<body>

<?php include(RUTA_VISTAS.'partes/cabecera.php') ?>

<div class="container-fluid">
    <div class="row">

        <?php include(RUTA_VISTAS.'partes/menu.php') ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-md-5 py-2">
            <div class="row text-center">
                <div class="col-md-4 py-md-3 py-2 order-2 order-md-1">
                    <a class="bt badge-primary" href="#">Crear Cuenta</a>
                </div>
                <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                    <div class="input-group">
                        <input type="text" placeholder="Buscar cliente" class="form-control"
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
                                <th scope="col">CC</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">USUARIO</th>
                                <th scope="col">E-MAIL</th>
                                <th scope="col">CELULAR</th>
                                <th scope="col">ZONA SEDE</th>
                                <th scope="col">ROL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0; $i < count($listaUsuarios);$i++){?>
                            <tr>
                                <td><?=$listaUsuarios[$i]->getIdentificacion(); ?></td>
                                <td><?=$listaUsuarios[$i]->getNombre(); ?></td>
                                <td><?=$listaUsuarios[$i]->getUsuario(); ?></td>
                                <td><?=$listaUsuarios[$i]->getEmail(); ?></td>
                                <td><?=$listaUsuarios[$i]->getCelular(); ?></td>
                                <td><?=$listaUsuarios[$i]->getZonaSede(); ?></td>
                                <td><?=$listaUsuarios[$i]->getRol(); ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include(RUTA_VISTAS.'partes/scripts.php') ?>

</body>
</html>