<nav class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-12 col-md-2 mr-0 p-1 text-center" href="<?php url("")?>"><img
                src="<?php assets("img/logo_project_control_min.png") ?>" width="50" alt=""></a>
    <h4 id="titleCabecera" class=" navbar-nav ml-2 px-8 text-center">Sales Control System</h4>

    <button class=" hamburger hamburger--collapse navbar-toggler position-absolute d-dm-none d-lg-none collapsed " type="button"
              data-toggle="collapse"
              data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
    </button>

    <ul class="navbar-nav pl-2 pr-3 py-1">
        <li class="nav-item text-nowrap">
            <form method="post" action="<?php url("autenticacion/logout") ?>">
                <button type="submit" class="btn btn-light"><span data-feather="log-out"></span></button>
            </form>
        </li>
    </ul>
</nav>
