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
        	  <ul class="collection">
              <li class="collection-item">Alvin</li>
              <li class="collection-item">Alvin</li>
              <li class="collection-item">Alvin</li>
              <li class="collection-item">Alvin</li>
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