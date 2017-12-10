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
  header("Location: postulados.php");
} 
else if(isset($_POST['rechazar'])) 
{ 
  $query="UPDATE avisos_usuarios
          SET id_estado=2
          WHERE id_aviso = $idaviso and id_usuario = $idusuario";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: postulados.php");
}  

  if(isset($_POST['lupa'])) 
{ 
  $_SESSION['postulado']=$idusuario;
  header("Location: perfilpostulado.php");
} 

  if(isset($_POST['calificar'])) 
{ 
  //al calificar subir 5 puntos al usuario si es positivo, bajar 5 si es negativo
  $query="UPDATE usuarios
          SET creditos='2';
          WHERE id_usuario = 1";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: postulados.php");
} 

?>