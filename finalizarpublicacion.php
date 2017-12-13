<?php
  
  //si en avisos_usuarios no existe aviso con usuario puede borrar
//si existe debe calificar primero

$aviso=($_GET['aviso']);

$query = "UPDATE avisos
          SET estado=1
          WHERE a.id_aviso='$aviso'";

mysqli_query($link, $query);
mysqli_close($link);
header("Location: postulados.php");
?>