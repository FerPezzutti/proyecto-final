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
          <div class="col s12 m6">
        	  <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header">
                  Mis Publicaciones
                  <span class="badge">
                    <?php
                    $userid = $_SESSION['id'];
                    $query="SELECT *
                    FROM avisos
                    WHERE id_usuario= '$userid'";
                    $result=mysqli_query($link, $query);
                    $numero_filas = mysqli_num_rows($result);

                    if ($numero_filas==null){
                    echo'0';
                    } else{
                      echo $numero_filas;
                      }
                  ?>
                  </span>
                </div>
                <div class="collapsible-body">
                  <?php
                    $userid = $_SESSION['id'];
                    $query="SELECT *
                    FROM avisos
                    WHERE id_usuario= '$userid'";
                    $result=mysqli_query($link, $query);
                    $numero_filas = mysqli_num_rows($result);

                    if ($numero_filas==null){
                    echo'<p>No tiene publicaciones</p>';
                    } else{
                      
                      while($row = mysqli_fetch_object($result))
                        {
                          echo'<form action="borraravisos.php" method="post">';
                          echo'<input type="hidden" name="id" value="' . $row->id_aviso . '">';
                          echo'<input type="hidden" name="titulo" value="' . $row->titulo . '">';
                          echo'<div class="row">
                                <div class="col s8"><p>' . $row->titulo . '</p></div>
                                <div class="col s4">
                                  <span class="badge"><button class="btn-floating btn-small waves-effect waves-light orange tooltipped data-position="bottom" data-delay="50" data-tooltip="Eliminar" name="tacho"><i class="material-icons">delete</i></button></span>
                                  <span class="badge"><button class="waves-effect waves-light btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Ver interesados" href="#modal1" name="lupa"><i class="material-icons">search</i></button></span>
                                </div>
                              </div>';
                          echo'</form>';
                        }
                      }
                  ?>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  Mis Ayudas
                  <span class="badge">
                    <?php
                      $userid = $_SESSION['id'];
                      $query="SELECT a.titulo as titulo
                      FROM avisos_usuarios as au join avisos as a on au.id_aviso=a.id_aviso
                      WHERE au.id_usuario= '$userid' and au.id_pedidoayuda='1'";
                      $result=mysqli_query($link, $query);
                      $numero_filas = mysqli_num_rows($result);

                      if ($numero_filas==null){
                      echo'0';
                      } else{
                        echo $numero_filas;
                        }
                    ?>
                  </span>
                </div>
                <div class="collapsible-body">
                  <?php
                    $userid = $_SESSION['id'];

                    $query="SELECT a.titulo as titulo, au.id_avisosusuarios as id, ea.descripcion as estado
                    FROM avisos_usuarios as au join avisos as a on au.id_aviso=a.id_aviso join estado_avisos as ea on au.id_estado=ea.id_estadoavisos
                    WHERE au.id_usuario= '$userid' and au.id_pedidoayuda='1'";
                    $result=mysqli_query($link, $query);
                    $numero_filas = mysqli_num_rows($result);

                    if ($numero_filas==null){
                    echo'<p>No posee ayudas pendientes</p>';
                    } else{
                      echo'<form action="borrar.php" method="post">';
                      while($row = mysqli_fetch_object($result))
                        {
                          echo'<input type="hidden" name="id" value="' . $row->id . '">';
                          echo'<div class="row">
                                <div class="col s9"><p>' . $row->titulo . '</p></div>
                                <div class="col s1">
                                  <span class="badge">' . $row->estado . '</span>
                                </div>
                                <div class="col s2">
                                  <span class="badge"><button class="btn-floating btn-small waves-effect waves-light orange tooltipped data-position="bottom" data-delay="50" data-tooltip="Eliminar"><i class="material-icons">delete</i></button></span>
                                  <span class="badge"><a class="waves-effect waves-light btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Ver interesados" href="#modal1"><i class="material-icons">search</i></a></span>
                                </div>
                              </div>';
                        }
                        echo'</form>';
                      }
                  ?>
                </div>
              </li>
              <li>
                <div class="collapsible-header">
                  Mis Solicitudes
                  <span class="badge">
                    <?php
                      $userid = $_SESSION['id'];
                      $query="SELECT a.titulo as titulo
                      FROM avisos_usuarios as au join avisos as a on au.id_aviso=a.id_aviso
                      WHERE au.id_usuario= '$userid' and au.id_pedidoayuda='2'";
                      $result=mysqli_query($link, $query);
                      $numero_filas = mysqli_num_rows($result);

                      if ($numero_filas==null){
                      echo'0';
                      } else{
                        echo $numero_filas;
                        }
                    ?>
                  </span>
                </div>
                <div class="collapsible-body">
                  <?php
                    $userid = $_SESSION['id'];

                    $query="SELECT a.titulo as titulo, au.id_avisosusuarios as id, ea.descripcion as estado
                    FROM avisos_usuarios as au join avisos as a on au.id_aviso=a.id_aviso join estado_avisos as ea on au.id_estado=ea.id_estadoavisos
                    WHERE au.id_usuario= '$userid' and au.id_pedidoayuda='2'";
                    $result=mysqli_query($link, $query);
                    $numero_filas = mysqli_num_rows($result);

                    if ($numero_filas==null){
                    echo'<p>No posee solicitudes pendientes</p>';
                    } else{
                      while($row = mysqli_fetch_object($result))
                        {
                          echo'<form action="borrar.php" method="post">';
                          echo'<input type="hidden" name="id" value="' . $row->id . '">';
                          echo'<div class="row">
                                <div class="col s1">
                                  <button class="btn-floating btn-small waves-effect waves-light orange"><i class="material-icons">delete</i></button>
                                </div>
                                <div class="col s8"><p>' . $row->titulo . '</p></div>
                                <div class="col s3">
                                  <span class="badge">' . $row->estado . '</span>
                                </div>
                              </div>';
                          echo'</form>';
                        }
                      }
                  ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </main>

    <!--  Scripts-->
 
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
<script>
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
  </body>
</html>