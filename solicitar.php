<?php
  require_once("conexion.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include ('header.php'); ?>
    <!-- CSS-->
    <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>
  <body>
    <?php include ('navbarperfil.php'); ?>
    <main>      
      <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <div class="col s12 m12">
            <div class="section"></div>
            <div class="row">
              <div class="col s12 m6 offset-m3">
                <div class="card-panel z-depth-1 grey lighten-4 row">
                  <div class="row">
                    <form class="col s12" action="validaraviso.php" method="post" onSubmit="">
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="titulo" name="titulo" type="text">
                          <label for="titulo">Titulo</label>
                        </div>
                        <div class="input-field col s12">
                          <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                          <label for="textarea1">Descripción</label>
                        </div>
                        <div class="input-field col s12">
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Imagen</span>
                              <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <p>
                          <input name="group1" type="radio" id="test1" />
                          <label for="test1">Servicio</label>
                        </p>
                        <p>
                          <input name="group1" type="radio" id="test2" />
                          <label for="test2">Producto</label>
                        </p>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <select id="categoria" name="categoria">
                            <option value="" disabled selected>Seleccione una categoria</option>
                              <?php
                                $query="SELECT * FROM avisos_categorias";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id . ">" . $row->descripcion . "</option>";
                                }
                              ?>
                          </select>
                          <label>Categoría</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s6">
                          <input id="localidad" name="localidad" type="text">
                          <label for="localidad">Localidad</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn #ef5350 red lighten-1 waves-effect waves-light right" type="submit" name="action">Crear
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>  
    <!--  Scripts-->
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
  </body>
</html>