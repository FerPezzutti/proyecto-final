<?php
  require_once("conexion.php");
  session_start();

  $id = $_POST['id'];
  

  $query="DELETE FROM avisos
          WHERE id_aviso = $id";

  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
?>