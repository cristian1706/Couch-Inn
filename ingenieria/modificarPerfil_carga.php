<?php

session_start();
$correo=$_POST['correo'];



	$conexion=mysqli_connect("localhost","root","","couchinn") or
	die("Problemas con la conexión");
	$query="SELECT * FROM usuario WHERE correo='$correo'";
	$registros= mysqli_query($conexion, $query);
	$correo = $_POST['correo'];
	$quiensoy =$_SESSION['correo'];

if(isset($_SESSION['nombre']) and $_SESSION['estado'] == 'Autenticado'){
	echo ("Bienvenido ".$_SESSION['nombre'].' '.$_SESSION['apellido']);}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300italic,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<title>Couch Inn</title>
</head>
<body>
<br>
<a href="cerrarSesion.php">Cerrar Sesion</a>
	<?php

	if ($reg=mysqli_fetch_array($registros))
	{
		?>
		<body>
			<header>
				<hgroup>
					<div class="col-md-6 center-block quitar-float text-center">
						<img src="couchinn.png" width="500" height="100">
					</hgroup>

					<nav class="col-md-6 center-block quitar-float text-center">
						<ul>
							<li><a href="indexSesion.php">Inicio</a></li>
							<li><a href="perfil.php">Perfil</a></li>
							<li><a href="faq.html">FAQ</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<?php 
			  if ($correo == $quiensoy){

			  	?>
			  	<div id="textoPr">
				

				<form action="modificarPerfil_actualiz.php" method="post">

				<p><label for="nombrenuevo">Ingrese nuevo nombre: </label><input type="text" name="nombrenuevo" class="textarea" required value="<?php echo $reg['nombre'] ?>"></input></p>

					<p><label for="apellidonuevo">Ingrese nuevo apellido: </label><input type="text" name="apellidonuevo" class="textarea" required value="<?php echo $reg['apellido'] ?>"></input></p>

					<p><label for="numeronuevo">Ingrese nuevo telefono: </label><input type="number" name="numeronuevo" class="textarea" required value="<?php echo $reg['telefono'] ?>"></input></p>

					<p><label for="fechanueva">Ingrese nueva fecha de nacimiento: </label><input type="date" name="fechanueva" class="textarea" required value="<?php echo $reg['nacimiento'] ?>"></input></p>

					<p><label for="clavenueva">Ingrese nueva contraseña: </label><input type="password" name="clavenueva" class="textarea" required value="<?php echo $reg['clave'] ?>"></input></p>

					<input type="submit" value="Actualizar datos" id="btnSubmit"></input>


				</form>
				</div>
				<?php } else { ?>
				

				<script type="text/javascript">
                alert("Correo erroneo, por favor vuelva a ingresar su correo!");
                window.location="modificarPerfil.php"
                </script>';
				

				<?php } 
				?>
				<?php
			}
			else{
				echo'<script type="text/javascript">
                alert("No existe usuario con dicho mail");
                window.location="modificarPerfil.php"
                </script>';
			}
			?>
		</body>
		</html>