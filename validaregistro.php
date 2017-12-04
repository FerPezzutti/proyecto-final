<?php
  
  require_once("conexion.php");
  
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $dni = $_POST['dni'];
  $direccion = $_POST['direccion'];
  $localidad = $_POST['localidad'];
  $codigopostal = $_POST['codigopostal'];
  $provincia = $_POST['provincia'];
  $telefono = $_POST['telefono'];
  $tipousuario = $_POST['tipousuario'];
  $creditos = '5';
  
 
  $query="Insert Into usuarios (nombre, apellido, email, password, documento, direccion, localidad, cod_postal, id_provincia_fk, telefono, id_usuariotipo_fk, creditos) Values ('$nombre','$apellido','$email','$password','$dni','$direccion','$localidad','$codigopostal','$provincia','$telefono','$tipousuario', '$creditos')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: login.php");
?>