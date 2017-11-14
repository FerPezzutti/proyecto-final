<?php
  
  require_once("conexion.php");
  
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];
  $localidad = $_POST['localidad'];
   
  $query="Insert Into avisos (titulo, descripcion, email, password, documento, direccion, localidad, cod_postal, id_provincia_fk, telefono, id_usuariotipo_fk) Values ('$nombre','$apellido','$email','$password','$dni','$direccion','$localidad','$codigopostal','$provincia','$telefono','$tipousuario')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: login.php");
?>