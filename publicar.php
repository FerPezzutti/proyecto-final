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
                    <form class="col s12" action="validaraviso.php" method="post" onSubmit="" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col s6">
                          <label for="tipoayuda">Tipo de aviso: </label>
                          <p>
                            <input name="tipoayuda" type="radio" id="necesito1" value="1" />
                            <label for="necesito1">Necesito</label>
                            <input name="tipoayuda" type="radio" id="ofrezco1" value="2" />
                            <label for="ofrezco1">Ofrezco</label>
                          </p>
                        </div>
                        <div class="input-field col s6">
                          <select id="categoria" name="categoria">
                            <option value="" disabled selected>Seleccione una categoria</option>
                              <?php
                                $query="SELECT * FROM avisos_categorias";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id_categoria . ">" . $row->descripcion . "</option>";
                                }
                              ?>
                          </select>
                          <label>Categoría</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="titulo" name="titulo" type="text">
                          <label for="titulo">Titulo</label>
                        </div>
                        <div class="input-field col s12">
                          <input type="hidden" name="pedidoayuda" value="2">
                          <textarea id="descripcion" name="descripcion" class="materialize-textarea"></textarea>
                          <label for="textarea1">Descripción</label>
                        </div>
                        <div class="input-field col s12">
                          <div class="file-field input-field">
                            <div class="btn">
                              <span>Imagen</span>
                              <input type="file" name="imageninput" id="imageninput">
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" name="nombreimg">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s6">
                          <input name="tipoaviso" type="radio" id="test1" value="1" />
                          <label for="test1">Servicio</label>
                          <input name="tipoaviso" type="radio" id="test2" value="2" />
                          <label for="test2">Producto</label>
                        </div>
                          <div class="input-field col s6">
                          <select id="provincia" name="provincia">
                              <?php
                                $id_usuario = $_SESSION['id'];
                                $query="SELECT p.nombre as provincia, p.id_provincia as idprovincia
                                        FROM usuarios as u join provincias as p on u.id_provincia_fk=p.id_provincia
                                        WHERE u.id_usuario='$id_usuario'";
                                $result=mysqli_query($link, $query);
                                $row = mysqli_fetch_object($result);
                                echo '<option value="' . $row->idprovincia . '" selected>' . $row->provincia . '</option>';
                              ?>
                            
                              <?php
                                $idprovincia = $_SESSION['provincia'];
                                $query="SELECT * 
                                        FROM provincias
                                        WHERE NOT id_provincia='$idprovincia'";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id_provincia . ">" . $row->nombre . "</option>";
                                }
                              ?>
                          </select>
                          <label>Provincia</label>
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