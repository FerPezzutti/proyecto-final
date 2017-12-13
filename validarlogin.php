<?php
  require_once("conexion.php");
  session_start();

  $email = $_POST['email'];
  $pass = $_POST['password'];

  $query="SELECT *
      FROM usuarios
      WHERE email=$email AND password=$pass";
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
    $_SESSION['provincia'] = $row->id_provincia_fk;
    $_SESSION['usuariotipo'] = $row->id_usuariotipo_fk;
    header("Location: resumen.php");
    }

?>

