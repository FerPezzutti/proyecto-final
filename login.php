<?php
  require_once("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('header.php'); ?>
</head>

<body>
<?php include ('navbar.php'); ?>
<main>
<center>
  <div class="section"></div>
  <div class="container">
    <div class="row">
      <div class="col m6 s12 offset-m3"><img id="logohome" src="images/logo1.png" width="350px"/>
      </div>
    </div>
  </div>
  <div class="section"></div>
  <div class="row">
    <div class="col s12 m4 l4 offset-m4 offset-l4">
      <div class="card-panel z-depth-1 grey lighten-4 row">
        <h4 class="header2">Iniciar sesión</h4>
        <div class="row">
          <form class="col s12" method="post" name="formlogin" action="validarlogin.php" id="loginValidate">
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Ingrese su email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Ingrese su contraseña</label>
              </div>
            </div>
            <center>
            <div class="row">
              <div class="input-field col s12">
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect #ef5350 red lighten-2'>Ingresar</button>
              </div>
            </div>
            </center>
          </form>
        </div>
      </div>
      <a href="registrarse.php">Registrarse</a>
    </div>
  </div>
</center>
</main>
<div class="section"></div>
<div class="section"></div>
<?php include ('footer.php'); ?>
</body>

</html>