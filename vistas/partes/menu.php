<nav id="sidebarMenu"
     class="col-12 col-md-2  d-md-block bg-light sidebar collapse text-md-left text-left mr-0 pr-0 py-md-5 px-0">
    <div class="sidebar-sticky p-10">

        <ul class="nav flex-column accordion" id="accordionExample">

            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span data-feather="airplay"></span>¡Hola!
                    <span>
                        <?php echo (isset($_SESSION['nombre_user'])) ? $_SESSION['nombre_user'] : "Error User_name" ?>
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" role="button" href="<?php url("usuario") ?>">
                    <span data-feather="users"></span>Usuario</a>
            </li>

            <li class="nav-item dropdow">
                <a class="nav-link dropdown-toggle" role="button" href="<?php url("cliente") ?>"
                   data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span data-feather="bar-chart-2"></span>Clientes</a>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <a class="dropdown-item" href="<?php url("cliente") ?>">Seguimiento de clientes</a>
                    <a class="dropdown-item" href="#">Ventas, productos y servicios</a>
                    <a class="dropdown-item" href="#">Generacion de Id de pedido</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span data-feather="dollar-sign"></span>Mi gestión</a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <a class="dropdown-item" href="#">Descuentos y promociones</a>
                    <a class="dropdown-item" href="#">Historial de ventas</a>
                    <a class="dropdown-item" href="#">Estrategias de ventas</a>
                    <a class="dropdown-item" href="#">Generación de informes financieros</a>
                    <a class="dropdown-item" href="#">Indicadores de gestión comercial</a>
                    <a class="dropdown-item" href="<?php url("volante") ?>">Volantes</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" href="#" data-bs-toggle="collapse"
                   data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span
                            data-feather="help-circle"></span>Ayudas</a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <a class="dropdown-item" href="<?php url("manuales") ?>">Manuales</a>
                </div>
            </li>

        </ul>

    </div>
</nav>
