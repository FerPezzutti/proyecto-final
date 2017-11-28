<?php
  require_once("conexion.php");
  session_start();

  $id_usuario = $_SESSION['id'];
  $id_aviso = $_POST['id_aviso'];
  $pedidoayuda = $_POST['pedidoayuda'];
  $id_estado = 1;

  $query="Insert Into avisos_usuarios (id_usuario, id_aviso, id_pedidoayuda, id_estado) Values ('$id_usuario','$id_aviso','$pedidoayuda', '$id_estado')";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
?>