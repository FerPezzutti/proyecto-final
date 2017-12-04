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
        	  
              <?php
              $id=$_SESSION['idaviso'];
              $titulo=$_SESSION['titulo'];
              $query="SELECT USU.id_usuario as idusuario, USU.nombre as usuario, USU.apellido as apellido, PROV.id_provincia, PROV.nombre as provincia, AVI.id_aviso, AVI.titulo as titulo, AVI.descripcion, AUSU.id_estado as estado FROM usuarios USU INNER JOIN avisos_usuarios AUSU ON USU.id_usuario = AUSU.id_usuario INNER JOIN avisos AVI ON AUSU.id_aviso = AVI.id_aviso INNER JOIN provincias PROV ON USU.id_provincia_fk = PROV.id_provincia WHERE AUSU.id_aviso = '$id'";
              $result=mysqli_query($link, $query);
              $numero_filas = mysqli_num_rows($result);
              if ($numero_filas==null){
              echo'<p><strong>No hay interesados en ' . $titulo . '</strong></p>';
              } else{
                echo'<p><strong>Interesados en ' . $titulo . '</strong></p>
                      <ul class="collection">';
                while($row = mysqli_fetch_object($result))
                  {
                    echo'<form action="estadopostulacion.php" method="post">';
                    echo'<input type="hidden" name="idaviso" value="' . $id . '">';
                    echo'<input type="hidden" name="idusuario" value="' . $row->idusuario . '">';
                    echo'<div class="row">
                          <div class="col s8">
                            <li class="collection-item avatar">
                              <img src="images/user.svg" alt="" class="circle">
                              <span class="title">' . $row->usuario . ' ' . $row->apellido . '</span>
                              <p>' . $row->provincia . '</p>
                            </li>
                          </div>
                          <div class="col s4">';
                            if($row->estado==1){
                              echo '<p>Pendiente</p>';
                              echo'<span class="badge"><button class="btn-floating btn-small waves-effect waves-light secondary-content tooltipped" href="" data-tooltip="Aprobar" name="aprobar"><i class="material-icons">check</i></button></span>
                              <span class="badge"><button class="btn-floating btn-small waves-effect waves-light red secondary-content tooltipped" href="" data-tooltip="Rechazar" name="rechazar"><i class="material-icons">clear</i></button></span>';
                            } else if($row->estado==3){
                                echo '<p>Aprobado</p>';
                                echo '<span class="badge"><button class="waves-effect waves-light btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Calificar" name="lupa"><i class="material-icons">create</i></button></span>';
                                echo '<span class="badge"><button class="waves-effect waves-light btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Ver Perfil" name="lupa"><i class="material-icons">search</i></button></span>';

                            } else {
                                echo '<p>Rechazado</p>';
                            }
                          echo'</div>';
                        echo'</div>';
                      echo'</form>';
                  }
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </main>

    <!--  Scripts-->
 
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>