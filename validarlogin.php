<?php
  
  require_once("conexion.php");
  
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $query="SELECT *
      FROM usuarios
      WHERE email='$email' AND password='$pass'";
  $result=mysqli_query($link, $query);
  $numero_filas = mysqli_num_rows($result);
  $row = mysqli_fetch_object($result);
  if ($numero_filas==null){
  echo '<p></p>';
  header("Location: resumen.php");
  exit;
  } else {
    session_start();
    $_SESSION['user'] = $email;
    $_SESSION['id'] = $row->id_usuario;
    header("Location: resumen.php");
    }

?>

