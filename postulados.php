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
              $user=$_SESSION['id'];
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
                    echo'<li class="collection-item avatar">
                              <img src="images/user.svg" alt="" class="circle">
                              <span class="title">' . $row->usuario . ' ' . $row->apellido . '</span>
                              <p>' . $row->provincia . '</p>';
                            
                            if($row->estado==1){
                              echo '<p class="orange-text">Pendiente</p>';
                              echo '<div class="secondary-content divpostulados">';

                              echo'<span class="badge"><button class="btn-floating btn-small waves-effect waves-light tooltipped" href="" data-tooltip="Aprobar" name="aprobar"><i class="material-icons">check</i></button></span>';
                              echo '<span class="badge"><button class="btn-floating btn-small waves-effect waves-light red tooltipped" href="" data-tooltip="Rechazar" name="rechazar"><i class="material-icons">clear</i></button></span>';
                              
                              echo'</div>';
                            } else if($row->estado==3){
                                echo '<p class="teal-text">Aprobado</p>';
                                echo '<div class="secondary-content divpostulados">';

                                echo '<span class="badge"><a class="waves-effect waves-light orange pulse btn-floating btn-small tooltipped dropdown-button btn data-activates="dropdown1" href="calificar.php?id_aviso=' . $id . '&id_usuario=' . $row->idusuario . ' " data-position="bottom" data-delay="50" data-tooltip="Calificar" name="calificar"><i class="material-icons">create</i></a></span>';
                                echo '<span class="badge"><button class="waves-effect waves-light orange btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Ver Perfil" name="lupa"><i class="material-icons">info_outline</i></button></span>';
                                
                                echo'</div>';
                            } else if($row->estado==4){
                                echo '<p class="orange-text">Calificado</p>';
                                echo '<div class="secondary-content divpostulados">';

                                echo '<span class="badge"><button class="waves-effect waves-light orange btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Ver Perfil" name="lupa"><i class="material-icons">info_outline</i></button></span>';
                                
                                echo'</div>';

                            } else {
                                echo '<p class="red-text">Rechazado</p>';
                            }

                          echo'</li>';
                      echo'</form>';
                  }
                  echo'</ul>';
                  echo'<a class="waves-effect waves-light btn orange right" href="finalizarpublicacion.php?aviso=' . $id . '&usuario=' . $user . ' ">Finalizar Publicacion</a>';
                }
              ?>
          </div>
        </div>
      </div>
    </main>

    <!--  Scripts-->
 
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script> 
      $('.dropdown-button').dropdown('open');
    </script>
  </body>
</html>