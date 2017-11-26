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
                          echo'<p>' . $row->titulo . '</p>';
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

                    $query="SELECT a.titulo as titulo
                    FROM avisos_usuarios as au join avisos as a on au.id_aviso=a.id_aviso
                    WHERE au.id_usuario= '$userid' and au.id_pedidoayuda='1'";
                    $result=mysqli_query($link, $query);
                    $numero_filas = mysqli_num_rows($result);

                    if ($numero_filas==null){
                    echo'<p>No hay</p>';
                    } else{
                      while($row = mysqli_fetch_object($result))
                        {
                          echo'<p>' . $row->titulo . '</p>';
                        }
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

                    $query="SELECT a.titulo as titulo
                    FROM avisos_usuarios as au join avisos as a on au.id_aviso=a.id_aviso
                    WHERE au.id_usuario= '$userid' and au.id_pedidoayuda='2'";
                    $result=mysqli_query($link, $query);
                    $numero_filas = mysqli_num_rows($result);

                    if ($numero_filas==null){
                    echo'<p>No hay</p>';
                    } else{
                      while($row = mysqli_fetch_object($result))
                        {
                          echo'<p>' . $row->titulo . '</p>';
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

  </body>
</html>