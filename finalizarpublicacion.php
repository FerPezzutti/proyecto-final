<?php
  require_once("conexion.php");
  session_start();
  //si en avisos_usuarios no existe aviso con usuario puede borrar
//si existe debe calificar primero
$aviso=$_GET['aviso'];

$query = "SELECT *
		FROM avisos_usuarios
		WHERE id_aviso='$aviso' and NOT id_estado IN ('4','2')";
$result=mysqli_query($link, $query);
$numero_filas = mysqli_num_rows($result);

if ($numero_filas==0){
	$query = "UPDATE avisos
			SET estado=1
          	WHERE id_aviso='$aviso'";
	mysqli_query($link, $query);
	mysqli_close($link);
	header("Location: resumen.php");
} else {
	/*echo '<script language="javascript">alert("Debe calificar a todos los usuarios antes de finalizar la publicacion");
		</script>';	*/

		echo '<script language="javascript">alert("Debe calificar a todos los usuarios antes de finalizar la publicacion"); window.location.href = "postulados.php";</script>';
}
 

?>