<?php
  require_once("conexion.php");
  session_start();

  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $tipoayuda = $_POST['tipoayuda'];
  $categoria = $_POST['categoria'];
  $provincia = $_POST['provincia'];
  $tipoaviso = $_POST['tipoaviso'];
  $id_usuario = $_SESSION['id'];

  $file_name=$_POST['nombreimg'];
  $uploads_dir = 'img/';
  $tmp_name = $_FILES["imageninput"]["tmp_name"];
  move_uploaded_file($tmp_name, "$uploads_dir $file_name");
  $pathimg="$file_name";
  
  $query="Insert Into avisos (titulo, descripcion, imagen, id_categoria, id_provincia, id_aviso_tipo, id_pedidoayuda, id_usuario) Values ('$titulo','$descripcion','$pathimg','$categoria','$provincia','$tipoaviso', '$tipoayuda', '$id_usuario')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
?>