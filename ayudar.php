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
			        		$query="SELECT a.titulo as titulo, a.descripcion as descripcion, a.imagen as imagen
							FROM avisos as a
							WHERE a.id_pedidoayuda='1'";
							$result=mysqli_query($link, $query);
							$numero_resultados = mysqli_num_rows($result);

							if ($numero_resultados==null){
							echo'<p>No hay anuncios disponibles</p>';
							} else{
								while($row = mysqli_fetch_object($result))
								{
									echo'<div class="col  m6">';
										echo'<div class="card medium">';
				              				echo'<div class="card-image waves-effect waves-block waves-light">';
				               					echo'<img class="activator" src="' . $row->imagen . '">';
				              				echo'</div>';
				              				echo'<div class="card-content">';
				                				echo'<span class="card-title activator grey-text text-darken-4">' . $row->titulo . '<i class="material-icons right">more_vert</i></span>';
				                   				echo'<div class="row">';
				                    				echo'<div class="col  m6 offset-m4">';
				                						echo'<a class="waves-effect waves-light btn-large">AYUDAR</a>';
				              						echo'</div>';
				             					echo'</div>';
				              				echo'</div>';
				              				echo'<div class="card-reveal">';
				                				echo'<span class="card-title grey-text text-darken-4">' . $row->titulo . '<i class="material-icons right">close</i></span>';
				                				echo'<p>' . $row->descripcion . '</p>';
				              				echo'</div>';
				            			echo'</div>';
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