<?php
  
  require_once("conexion.php");
  
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $tipoayuda = $_POST['tipoayuda'];
  $file_name=$_POST['nombreimg'];
  $uploads_dir = 'img/';
  $tmp_name = $_FILES["imageninput"]["tmp_name"];
  move_uploaded_file($tmp_name, "$uploads_dir $file_name");
  $pathimg="img/$file_name";
  
  $categoria = $_POST['categoria'];
  $localidad = $_POST['localidad'];
  $tipoaviso = $_POST['tipoaviso'];

  $query="Insert Into avisos (titulo, descripcion, imagen, id_categoria, localidad, id_aviso_tipo, tipoayuda) Values ('$titulo','$descripcion','$pathimg','$categoria','$localidad','$tipoaviso', '$tipoayuda')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: perfil.php");
?>