<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrar Usuario</title>
    <?php include(RUTA_VISTAS . 'partes/head.php') ?>
</head>

<body>

<?php include(RUTA_VISTAS . 'partes/cabecera.php') ?>

<div class="container-fluid">

  <div class="row">

    <?php include(RUTA_VISTAS . 'partes/menu.php') ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-md-5 py-2 ">

            <div class="text-center">

                <img class="mb-4 img-fluid" src="../img/user_bussines.png" alt="" width="100" height="100">

                    <h3>REGISTRAR USUARIO</h3>

            </div>

                  <form class="form " id="login" method="post" action="<?php url("usuario/crear") ?>">
                      <input type="hidden" name="proceso" value="login"><!--Aqui debe ir un token-->

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">IDENTIFICACIÓN</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="identificacion" id="identificacion" class="form-control text-center my-2" placeholder="Ingrese cedula del usuario">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">NOMBRE</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="nombre" id="nombre" class="form-control text-center my-2" placeholder="Ingrese nombre del usuario">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">CELULAR</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="celular" id="celular" class="form-control text-center my-2" placeholder="Ingrese celular">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">USUARIO</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="usuario" id="usuario" class="form-control text-center my-2" placeholder="Ingrese usuario">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">CONTRASEÑA</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="contrasena" id="contrasena" class="form-control text-center my-2" placeholder="Ingrese contraseña">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">E-MAIL</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="email" id="email" class="form-control text-center my-2" placeholder="Ingrese e-mail">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">ZONA SEDE</label>
                          </div>

                          <div class="col-md-5">
                              <input type="text"  name="sede" id="sede" class="form-control text-center my-2" placeholder="Ingrese sede">
                          </div>

                      </div>

                      <div class=" form-group row offset-md-2 my-0">
                          <div class="col-md-3">
                            <label for="identificacion" class="col-form-label my-2">ROL</label>
                          </div>

                          <div class="col-md-5">
                                <input type="text"  name="rol" id="rol" class="form-control text-center my-2" placeholder="Ingrese rol">
                          </div>

                      </div>




                      <div class="form-group row offset-md-2 my-2 mt-4">
                              <div class="col-md-8 ">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="boton">REGISTRAR</button>
                              </div>


                      </div>




                  </form>


                  <footer class="row offset-md-2 text-center">
                        <p class="mt-5 mb-3 text-muted col-md-8">&copy;2020</p>
                  </footer>

           </main>
      </div>

</div>



<?php include(RUTA_VISTAS . 'partes/scripts.php') ?>
</body>
</html>