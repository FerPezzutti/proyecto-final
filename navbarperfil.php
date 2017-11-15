<div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav waves-effect waves-light circle hide-on-large-only"><i class="material-icons">menu</i></a></div>
    <nav class="teal lighten-2" role="navigation">
		<div class="nav-wrapper container">
	        	<ul class="right">
					<li><?php echo $_SESSION['user']; ?><i class="material-icons">account_circle</i></li>
					<li><a href="logout.php" class="white-text">Salir<i class="material-icons">exit_to_app</i></a></li>
				</ul>
	    </div>
	</nav>

	<ul id="nav-mobile" class="side-nav fixed red lighten-2">
		<li class="logo"><img id="logohome" src="images/logoblanco.png" width="250px"/>
		<li class="bold"><a href="resumen.php" class="waves-effect waves-teal">Resumen</a></li>
		<li class="bold"><a href="perfil.php" class="waves-effect waves-teal">Mi Perfil</a></li>
		<li class="bold"><a href="ayudar.php" class="waves-effect waves-teal">Ofrece tu ayuda</a></li>
		<li class="bold"><a href="pedirayuda.php" class="waves-effect waves-teal">Encontra lo que necesitas</a></li>
		<li class="bold"><a href="publicarayuda.php" class="waves-effect waves-teal">Publicar una ayuda</a></li>
		<li class="bold"><a href="publicarpedido.php" class="waves-effect waves-teal">Publicar un pedido</a></li>
	</ul>