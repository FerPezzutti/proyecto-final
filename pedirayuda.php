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
				<div class= "row">
          <!-- filtros -->
          <form class="col s12" action="pedirayuda.php" method="get" onSubmit="" enctype="multipart/form-data">
            <div class="input-field col s5">
                          <select id="categoria" name="categoria">
                              <?php
                                $provinciafiltro=$_GET['provincia'];
                                $categoriafiltro=$_GET['categoria'];
                                $query="SELECT * FROM avisos_categorias";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id_categoria . ">" . $row->descripcion . "</option>";
                                }
                              ?>
                          </select>
                          <label>Categoría</label>
                        </div>
                  <div class="input-field col s5">
                          <select id="provincia" name="provincia">
                              <?php
                              $provinciafiltro=$_GET['provincia'];
                                $id_usuario = $_SESSION['id'];
                                $query="SELECT p.nombre as provincia, p.id_provincia as idprovincia
                                        FROM usuarios as u join provincias as p on u.id_provincia_fk=p.id_provincia
                                        WHERE u.id_usuario='$id_usuario'";
                                $result=mysqli_query($link, $query);
                                $row = mysqli_fetch_object($result);
                                echo '<option value="' . $row->idprovincia . '" selected>' . $row->provincia . '</option>';
                             
                                $idprovincia = $_SESSION['provincia'];
                                $query="SELECT * 
                                        FROM provincias
                                        WHERE NOT id_provincia='$idprovincia'";
                                $result=mysqli_query($link, $query);
                                while($row = mysqli_fetch_object($result))
                                {
                                echo "<option value=" . $row->id_provincia . ">" . $row->nombre . "</option>";
                                }
                              ?>
                          </select>
                          <label>Provincia</label>
                      </div>
                        <!-- boton buscar -->
                        <div class="col s2">
                        <span class="badge"><button class="btn-floating btn-small waves-effect waves-light tooltipped" href="" data-tooltip="Filtrar Anuncios"><i class="material-icons">search</i></button></span>
                    	</div>
                    </div>		
                   </form>	
				<div class="col s12 m12">					
			        <div class="row">			        	
			        	<?php

                if ($provinciafiltro==null && $categoriafiltro==null){

			        		$userid = $_SESSION['id'];
			        		$query="SELECT a.id_aviso as id_aviso, a.titulo as titulo, a.descripcion as descripcion, a.imagen as imagen, p.nombre as provincia, c.descripcion as categoria, a.id_pedidoayuda as pedidoayuda, usu.creditos as creditos
							FROM avisos as a 
              join provincias as p on a.id_provincia=p.id_provincia 
              join avisos_categorias as c on a.id_categoria=c.id_categoria
              join usuarios as usu on a.id_usuario=usu.id_usuario
							WHERE a.id_pedidoayuda='2' and NOT a.id_usuario='$userid' and a.estado='0'";
							$result=mysqli_query($link, $query);
							$numero_resultados = mysqli_num_rows($result);
            } else {
              $userid = $_SESSION['id'];
                  $query="SELECT a.id_aviso as id_aviso, a.titulo as titulo, a.descripcion as descripcion, a.imagen as imagen, p.nombre as provincia, c.descripcion as categoria, a.id_pedidoayuda as pedidoayuda, usu.creditos as creditos
              FROM avisos as a 
              join provincias as p on a.id_provincia=p.id_provincia 
              join avisos_categorias as c on a.id_categoria=c.id_categoria
              join usuarios as usu on a.id_usuario=usu.id_usuario
              WHERE a.id_pedidoayuda='2' and NOT a.id_usuario='$userid' and p.id_provincia='$provinciafiltro' and c.id_categoria=$categoriafiltro and a.estado='0'";
              $result=mysqli_query($link, $query);
              $numero_resultados = mysqli_num_rows($result);
            }

							if ($numero_resultados==null){
							echo'<p>No hay anuncios disponibles</p>';
							} else{
								while($row = mysqli_fetch_object($result))
								{
									echo'<form method="post" name="formcard" action="postulacion.php">';
										echo'<div class="col  m6">';
											echo'<div class="card large hoverable">';
					              				echo'<div class="card-image waves-effect waves-block waves-light">';
					               					echo'<img class="activator" src="img/' . $row->imagen . '">';
					               					echo'<input type="hidden" name="id_aviso" value="' . $row->id_aviso . '">';
					              				echo'</div>';
					              				echo'<div class="card-content">';
					                				echo'<span class="card-title activator grey-text text-darken-4">' . $row->titulo . '<i class="material-icons right">more_vert</i></span>';
					                				echo'<div class="chip">' . $row->categoria . '</div>';
				                					echo'<div class="chip">' . $row->provincia . '</div>';
                                  echo'<div class="chip"><i class="tiny material-icons">star</i>' . $row->creditos . '</div>';
				                					echo'<div class="card-action center">
										              <a href="aviso.php?idaviso='.$row->id_aviso.'" class="btn btn-large waves-effect waves-light"><i class="small material-icons right">search</i>VER</a>
										              <button type="submit" name="btn_solicitar" class="waves-effect waves-light btn-large"><i class="small material-icons right">check_circle</i>SOLICITAR</button>
										            </div>';
					              				echo'</div>';
					              				echo'<div class="card-reveal">';
					                				echo'<span class="card-title grey-text text-darken-4">' . $row->titulo . '<i class="material-icons right">close</i></span>';
					                				echo'<p>' . $row->descripcion . '</p>';
					                				echo'<input type="hidden" name="pedidoayuda" value="' . $row->pedidoayuda . '">';
					              				echo'</div>';
					            			echo'</div>';
					        			echo'</div>';
				        			echo'</form>';
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