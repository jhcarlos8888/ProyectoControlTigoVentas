<!DOCTYPE html>

<html lang="es">

<head>
    <title>Lista de Usuarios</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>


<body>


    <?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

    <div class="container-fluid">

        <div class="row">

            <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

            <main role="main" class="col-12 col-md-10 px-md-4 py-md-5 py-2">
                <div class="row">
                    <div class="col-md-4 py-md-3 py-2 order-2 order-md-1">
                        <a class="btn btn-primary w-100" href="<?php url("usuario/registrar") ?>"
                           role="button">Registrar Usuario</a>
                    </div>

                    <div class="offset-md-2 col-md-6 offset-lg-4 col-lg-4 py-md-3 order-1 order-md-2">
                        <div class="input-group">
                            <input type="text" id="busqueda" placeholder="Buscar Usuario" class="form-control" data-generator="usuario"
                                   aria-label="Text input with segmented dropdown button">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary">
                                    <span data-feather="search"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 order-3  table-responsive">

                        <table id="tableList" class="table table-hover" aria-label="lista de usuarios">
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
                            <tbody id="bodyTable">
                                <?php if (isset($listaUsuarios)) {
                                    for ($i = 0; $i < count($listaUsuarios); $i++) {
                                        ?>
                                        <tr>
                                            <td><?= $listaUsuarios[$i]->__get("identificacion"); ?></td>
                                            <td><?= $listaUsuarios[$i]->__get("nombre"); ?></td>
                                            <td><?= $listaUsuarios[$i]->__get("usuario"); ?></td>
                                            <td><?= $listaUsuarios[$i]->__get("email"); ?></td>
                                            <td><?= $listaUsuarios[$i]->__get("celular"); ?></td>
                                            <td><?= ($listaUsuarios[$i]->__get("sede"))->getNombre(); ?></td>
                                            <td><?= ($listaUsuarios[$i]->__get("rol"))->getNombre(); ?></td>
                                            <td>
                                                <a href="<?php url("usuario/editar/" . $listaUsuarios[$i]->__get("id_usuario")) ?>"
                                                   class="bnt" title="Editar"><span data-feather="edit-3"></span></a>
                                                <a href="<?php url("usuario/eliminar/" . $listaUsuarios[$i]->__get("id_usuario")) ?>"
                                                   class="bnt" title="Eliminar"><span data-feather="trash-2"></span></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
    <script>
    /**
     * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
     *
     * @private
     * @author Todd Motto
     * @link https://github.com/toddmotto/foreach
     * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
     * @callback requestCallback      callback   - Callback function for each iteration.
     * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
     * @returns {}
     */
      var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

      var hamburgers = document.querySelectorAll(".hamburger");
      if (hamburgers.length > 0) {
        forEach(hamburgers, function(hamburger) {
          hamburger.addEventListener("click", function() {
            this.classList.toggle("is-active");
          }, false);
        });
      }
    </script>

</body>
</html>
