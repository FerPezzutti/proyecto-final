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
            <div class="collection">
              <?php
                $user = $_SESSION['user'];
                $query="SELECT u.nombre as nombre, u.apellido as apellido, u.email as email, u.password as password, u.documento as documento, u.direccion as direccion, u.localidad as localidad, u.cod_postal as codigopostal, p.nombre as provincia, u.telefono as telefono, ut.nombre_tipo as usuariotipo
                FROM usuarios as u join provincias as p on u.id_provincia_fk=p.id_provincia join usuarios_tipo as ut on u.id_usuariotipo_fk=ut.id_usuariotipo
                WHERE u.email= '$user'";
                $result=mysqli_query($link, $query);
                $row = mysqli_fetch_object($result);
<<<<<<< HEAD
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->nombre . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->apellido . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->email . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->password . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->documento . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->direccion . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->localidad . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->codigopostal . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->provincia . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->telefono . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right"></i>' . $row->usuariotipo . '</a>';
=======
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Nombre: ' . $row->nombre . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Apellido: ' . $row->apellido . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Email: ' . $row->email . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Direccion: ' . $row->direccion . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Localidad ' . $row->localidad . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>CP: ' . $row->codigopostal . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Provincia: ' . $row->provincia . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Telefono: ' . $row->telefono . '</a>';
                echo '<a href="#!" class="collection-item"><i class="material-icons right">create</i>Tipo de Usuario: ' . $row->usuariotipo . '</a>';
>>>>>>> cb8c08760b7e152af5f67e293a9c6bcef76a474c
              ?>
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