<?php
  require_once("conexion.php");
  session_start();
  $idusuario = $_POST['idusuario'];
  $id_aviso = $_POST['id_aviso'];

  if(isset($_POST['negativo'])) 
{ 
  $query="UPDATE usuarios
          SET creditos=creditos-5
          WHERE id_usuario='$idusuario'";
  mysqli_query($link, $query);

  $query2="UPDATE avisos_usuarios
          SET id_estado=4
          WHERE id_usuario='$idusuario' and id_aviso='$id_aviso'";
  mysqli_query($link, $query2);

  mysqli_close($link);
  header("Location: postulados.php");
} 
else if(isset($_POST['neutro'])) 
{ 
  $query2="UPDATE avisos_usuarios
          SET id_estado=4
          WHERE id_usuario='$idusuario' and id_aviso='$id_aviso'";
  mysqli_query($link, $query2);
  header("Location: postulados.php");
}  

  if(isset($_POST['positivo'])) 
{ 
  $query="UPDATE usuarios
          SET creditos=creditos+5
          WHERE id_usuario='$idusuario'";
  mysqli_query($link, $query);
  $query2="UPDATE avisos_usuarios
          SET id_estado=4
          WHERE id_usuario='$idusuario' and id_aviso='$id_aviso'";
  mysqli_query($link, $query2);
  
  mysqli_close($link);
  header("Location: postulados.php");
} 


?>