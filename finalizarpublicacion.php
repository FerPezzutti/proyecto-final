<?php
  
  //si en avisos_usuarios no existe aviso con usuario puede borrar
//si existe debe calificar primero

$aviso=($_GET['aviso']);

<<<<<<< HEAD
$query = "UPDATE avisos
          SET estado=1
=======
$query = "UPDATE avisos as a
          SET a.estado=1
>>>>>>> 8685959ce4d75cf6777af69b5186c06924a21cc1
          WHERE a.id_aviso='$aviso'";

mysqli_query($link, $query);
mysqli_close($link);
header("Location: postulados.php");
?>