<?php
  require_once("conexion.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include ('header.php'); ?>
    <!-- CSS-->
    <link href="css/ghpages-materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  </head>
  <body>
  	<?php include ('navbarperfil.php'); ?>
    <main>      
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				<div class="col s12 m12">
			        <div class="row">
			        	
			        	<?php
			        		$idaviso=$_GET['idaviso'];
			        		$userid = $_SESSION['id'];
			        		$query="SELECT a.id_aviso as id_aviso, a.titulo as titulo, a.descripcion as descripcion, a.imagen as imagen, p.nombre as provincia, c.descripcion as categoria, a.id_pedidoayuda as pedidoayuda
							FROM avisos as a join provincias as p on a.id_provincia=p.id_provincia join avisos_categorias as c on a.id_categoria=c.id_categoria
							WHERE a.id_aviso='$idaviso'";
							$result=mysqli_query($link, $query);
							$numero_resultados = mysqli_num_rows($result);

							if ($numero_resultados==null){
							echo'<p>No hay anuncios disponibles</p>';
							} else{
								while($row = mysqli_fetch_object($result))
								{
									echo'<div class="col  m12">';
										echo'<div class="card large">';?>
			        						<?php
				              				echo'<div class="card-image">';
				               					echo'<img src="img/' . $row->imagen . '">';
				              				echo'</div>';
				              				echo'<div class="container center-align">';
				                				echo'<h5>' . $row->titulo .'</h5>';
				                				echo'<div class="chip">' . $row->categoria . '</div>';
				                				echo'<div class="chip">' . $row->provincia . '</div>';
				                				echo'<p>' . $row->descripcion . '</p>';				                				
				              				echo'</div>';
				            			echo'</div>';
				            			echo'<div class="center-align">
												<a href="https://fb.com/sharer/sharer.php?u=" class="btn-simple"><i class="fa fa-facebook"></i> Facebook</a>
				        						<a href="http://www.twitter.com/share?url="><i class="fa fa-twitter"></i> Twitter</a>
			        						</div>';
				        			echo'</div>';
				        		}
				        	}
			        	?>
	        		</div>
	        	</div>
	        </div>
	    </div>
    </main>

    <!--  Scripts-->
 
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

  </body>
</html>