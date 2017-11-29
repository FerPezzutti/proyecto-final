<?php
  require_once("conexion.php");
  session_start();
  $id = $_POST['id'];
  $titulo = $_POST['titulo'];
  
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
	$id = $_POST['id'];
	$_SESSION['idaviso'] = $id;
	$_SESSION['titulo'] = $titulo;
  header("Location: postulados.php");
}  

  
?>