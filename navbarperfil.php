<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
    <nav class="teal lighten-2" role="navigation">
		<div class="nav-wrapper container">
	        	<ul class="right">
	        		<?php
		        		$userid = $_SESSION['id'];
	                    $query="SELECT *
	                    FROM usuarios
	                    WHERE id_usuario= '$userid'";
	                    $result=mysqli_query($link, $query);
                        $row = mysqli_fetch_object($result);
	                    echo'<li>' . $row->creditos . ' Creditos<i class="material-icons left">attach_money</i></li>';
                  	?>
					<li><a href="perfil.php"><?php echo $_SESSION['user']; ?><i class="material-icons left">account_circle</i></a></li>
					<li><a href="logout.php" class="white-text">Salir<i class="material-icons left">exit_to_app</i></a></li>
				</ul>
	    </div>
	</nav>

	<ul id="nav-mobile" class="side-nav fixed red lighten-2">
		<li class="logo"><img id="logohome" src="images/logoblanco.png" width="250px"/>
		<li class="bold"><a href="resumen.php" class="waves-effect waves-teal">Resumen<i class="material-icons left white-text small iconosperfil">insert_chart</i></a></li>
		<li class="bold"><a href="ayudar.php" class="waves-effect waves-teal">Quiero ayudar<i class="material-icons left white-text small iconosperfil">thumb_up</i></a></li>
		<li class="bold"><a href="pedirayuda.php" class="waves-effect waves-teal">Necesito ayuda<i class="material-icons left white-text small iconosperfil">pan_tool</i></a></li>
		<li class="bold"><a href="publicar.php" class="waves-effect waves-teal">Publicar aviso<i class="material-icons left white-text small iconosperfil">edit</i></a></li>
	</ul>