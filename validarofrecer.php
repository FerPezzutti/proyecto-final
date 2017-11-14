<?php
  
  require_once("conexion.php");
  
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $imagen = "hola";
  $categoria = $_POST['categoria'];
  $localidad = $_POST['localidad'];
  $tipoaviso = 1;
   
  $query="Insert Into avisos (titulo, descripcion, imagen, id_categoria, localidad, id_aviso_tipo) Values ('$titulo','$descripcion','$imagen','$categoria','$localidad','$tipoaviso')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: perfil.php");
?>