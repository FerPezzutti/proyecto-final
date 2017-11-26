<?php
  require_once("conexion.php");
  session_start();

  $id_usuario = $_SESSION['id'];
  $id_aviso = $_POST['id_aviso'];
    
  $query="Insert Into avisos_usuarios (id_usuario, id_aviso) Values ('$id_usuario','$id_aviso')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
?>