<?php
  require_once("conexion.php");
  session_start();

  $id = $_POST['id'];
  $postulado = $_POST['datosusuario'];
  
if(isset($_POST['borrar'])) 
{ 
  $query="DELETE FROM avisos_usuarios
          WHERE id_avisosusuarios = $id";

  mysqli_query($link, $query);
  mysqli_close($link);
  header("Location: resumen.php");
}

if(isset($_POST['lupa'])) 
{ 
	$_SESSION['postulado']=$postulado;
	
  header("Location: perfilpostulado.php");
} 

?>