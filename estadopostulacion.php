<?php
  require_once("conexion.php");
  session_start();
  $idaviso = $_POST['idaviso'];
  $idusuario = $_POST['idusuario'];
  
  if(isset($_POST['aprobar'])) 
{ 
   $query="UPDATE avisos_usuarios
          SET id_estado=3
          WHERE id_aviso = $idaviso and id_usuario = $idusuario";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
} 
else if(isset($_POST['rechazar'])) 
{ 
  $query="UPDATE avisos_usuarios
          SET id_estado=2
          WHERE id_aviso = $idaviso and id_usuario = $idusuario";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
}  

  if(isset($_POST['lupa'])) 
{ 
  header("Location: resumen.php");
} 
  
?>