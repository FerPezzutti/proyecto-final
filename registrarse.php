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

<main>
<center>
	<div class="section"></div>
<div class="container">
	<div class="row">
		<div class="col m6 s12 offset-m3"><img id="logohome" src="images/logo1.png" width="350px"/>
		</div>
	</div>
</div>
	<div class="section"></div>
	<div class="row">
		<div class="col s12 m6 offset-m3">
			<div class="card-panel z-depth-1 grey lighten-4 row">
				<h4 class="header2">Registrate</h4>
				<div class="row">
					<form class="col s12" action="validaregistro.php" method="post" onSubmit="return validar_pagarreserva()">
						<div class="row">
							<div class="input-field col s6">
								<input id="nombre" name="nombre" type="text">
								<label for="nombre">Nombre</label>
							</div>
							<div class="input-field col s6">
								<input id="apellido" name="apellido" type="text">
								<label for="apellido">Apellido</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="email" name="email" type="email">
								<label for="email">Email</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="password" name="password" type="password">
								<label for="passwor">Password</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col m6"> 
								<select id="tipousuario" name="tipousuario">
									<option value="" disabled selected>Tipo de usuario</option>
									<?php
										$query="SELECT * FROM usuarios_tipo";
										$result=mysqli_query($link, $query);
										while($row = mysqli_fetch_object($result))
										{
										echo "<option value=" . $row->id_usuariotipo . ">" . $row->nombre_tipo . "</option>";
										}
									?>
								</select>
							</div> 

							<div class="input-field col s6">
								<input id="dni" name="dni" type="number">
								<label for="dni">DNI/CUIT</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<input id="direccion" name="direccion" type="text">
								<label for="direccion">Direccion</label>
							</div>
						</div>	

						<div class="row">
							<div class="input-field col s6">
								<input id="localidad" name="localidad" type="text">
								<label for="localidad">Localidad</label>
							</div>
							<div class="input-field col m6"> 
								<select id="provincia" name="provincia">
									<option value="" disabled selected>Provincia</option>
									<?php
									$query="SELECT * FROM provincias";
									$result=mysqli_query($link, $query);
									while($row = mysqli_fetch_object($result))
									{
									echo "<option value=" . $row->id_provincia . ">" . $row->nombre . "</option>";
									}
									?>
								</select>

							</div>
						</div>

						<div class="row">
							<div class="input-field col s6">
								<input id="codigopostal" name="codigopostal" type="number">
								<label for="codigopostal">Código Postal</label>
							</div>
							<div class="input-field col s6">
								<input id="telefono" name="telefono" type="number">
								<label for="telefono">Teléfono</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<button class="btn #ef5350 red lighten-1 waves-effect waves-light right" type="submit" name="action">Registrarse
									<i class="mdi-content-send right"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <div class="section"></div>
	<div class="section"></div>
</center>
</main>
<?php include ('footer.php'); ?>
</body>

</html>