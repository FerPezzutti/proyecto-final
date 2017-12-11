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
              $id_usuario=($_GET['id_usuario']);
              $id_aviso=($_GET['id_aviso']);

              $query="SELECT u.nombre as nombre, u.apellido as apellido, p.nombre as provincia, u.id_usuario as idusuario
                      FROM usuarios as u join provincias as p on u.id_provincia_fk=p.id_provincia
                      WHERE id_usuario = $id_usuario";

              $result=mysqli_query($link, $query);
              $row = mysqli_fetch_object($result);
              echo'<p><strong>Calificar usuario</strong></p>';
              echo'<form action="calificacion.php" method="post">';
              echo'<ul class="collection">';
              echo'<li class="collection-item avatar">
                              <img src="images/user.svg" alt="" class="circle">
                              <input type="hidden" name="idusuario" value="' . $row->idusuario . '">
                              <input type="hidden" name="id_aviso" value="' . $id_aviso . '">
                              <span class="title">' . $row->nombre . ' ' . $row->apellido . '</span>
                              <p>' . $row->provincia . '</p>';
              echo '<div class="secondary-content divpostulados">';
              echo'<span class="badge"><button class="btn-floating btn-small waves-effect waves-light tooltipped red" href="" data-tooltip="Negativo" name="negativo"><i class="material-icons">remove_circle_outline</i></button></span>';
              echo '<span class="badge"><button class="btn-floating btn-small waves-effect waves-light orange tooltipped" href="" data-tooltip="Neutro" name="neutro"><i class="material-icons">adjust</i></button></span>';
              echo '<span class="badge"><button class="waves-effect waves-light teal btn-floating btn-small modal-trigger tooltipped data-position="bottom" data-delay="50" data-tooltip="Positivo" name="positivo"><i class="material-icons">add_circle_outline</i></button></span>';
              echo'</div>';
              echo'</li>';
              echo'</form>';
              echo'</ul>';
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