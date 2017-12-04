<?php
  require_once("conexion.php");
  session_start();

  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $tipoayuda = $_POST['tipoayuda'];
  $categoria = $_POST['categoria'];
  $provincia = $_POST['provincia'];
  $tipoaviso = $_POST['tipoaviso'];
  $id_usuario = $_SESSION['id'];
  $usuariotipo = $_SESSION['usuariotipo'];
  $creditosusuario = $_POST['creditosusuario'];
  $file_name=$_POST['nombreimg'];
  $uploads_dir = 'img/';
  $tmp_name = $_FILES["imageninput"]["tmp_name"];
  move_uploaded_file($tmp_name, "$uploads_dir $file_name");
  $pathimg="$file_name";


  if(($creditosusuario<'5') && ($tipoayuda==1) && ($usuariotipo==1)){
    echo'<script type="text/javascript">
    alert("No posee los creditos necesarios para realizar esta operacion");
    window.location.href="publicar.php";
    </script>';
  } else  if (($tipoayuda==1) && ($creditosusuario>'5') && ($usuariotipo==1)){
          $creditosarestar = "5";
          $creditosnuevos = $creditosusuario - $creditosarestar;
          $queryupd="UPDATE usuarios
                    SET creditos = '$creditosnuevos'
                    WHERE id_usuario=$id_usuario";
          mysqli_query($link, $queryupd);
          $query="Insert Into avisos (titulo, descripcion, imagen, id_categoria, id_provincia, id_aviso_tipo, id_pedidoayuda, id_usuario) Values ('$titulo','$descripcion','$pathimg','$categoria','$provincia','$tipoaviso', '$tipoayuda', '$id_usuario')";
          mysqli_query($link, $query);
          mysqli_close($link);
          header("Location: resumen.php");
        } else {
          $query="Insert Into avisos (titulo, descripcion, imagen, id_categoria, id_provincia, id_aviso_tipo, id_pedidoayuda, id_usuario) Values ('$titulo','$descripcion','$pathimg','$categoria','$provincia','$tipoaviso', '$tipoayuda', '$id_usuario')";
          mysqli_query($link, $query);
          mysqli_close($link);
          header("Location: resumen.php");
        }
?>