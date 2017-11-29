<?php
  require_once("conexion.php");
  session_start();
  $id = $_POST['id'];
  
  if(isset($_POST['tacho'])) 
{ 
   $query="DELETE FROM avisos
          WHERE id_aviso = $id";
  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
} 
else if(isset($_POST['lupa'])) 
{ 
  header("Location: postulados.php");
}  

  
?>