<?php
	require_once("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include ('header.php'); ?>
</head>
	<body>
	<?php include ('navbar.php'); ?>
	<div class="section"></div>
		<div class="container">
			<div class="row">
				<div class="col s6 offset-s4"><img id="logohome" src="images/logo1.png" width="350px"/></div>
			</div>
		</div>

		<div class="container">
		<div class="section">

			<!--   Icon Section   -->
			<div class="row">
				<div class="col s12 m6">
					<div class="icon-block">
						<h2 class="center homeicons"><img id="manonecesito" src="images/necesito.png" /></h2>
						<h5 class="center homeh5">Necesito</h5>
						<br>
						<p class="light center">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
					</div>
				</div>

			    <div class="col s12 m6">
					<div class="icon-block">
						<h2 class="center homeicons"><img id="manoofrezco" src="images/ofrezco.png" /></h2>
						<h5 class="center homeh5">Ofrezco</h5>
						<br>
						<p class="light center">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
					</div>
			    </div>
			</div>
		</div>
		<br><br>
		</div>

	<?php include ('footer.php'); ?>
<!--  Scripts-->
    

    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

	</body>
</html>
