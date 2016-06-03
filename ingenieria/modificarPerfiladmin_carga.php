<?php

session_start();
$correo=$_POST['correo'];



	$conexion=mysqli_connect("localhost","root","","couchinn") or
	die("Problemas con la conexión");
	$query="SELECT * FROM administrador WHERE correo='$correo'";
	$registros= mysqli_query($conexion, $query);
	$correo = $_POST['correo'];
	$quiensoy =$_SESSION['correo'];


if(isset($_SESSION['correo']) and $_SESSION['estado'] == 'Autenticado'){
	echo ("Bienvenido ".$_SESSION['correo']);}

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

<div class="cerrar">
		
		<a href="cerrarSesion.php">Cerrar Sesion</a>
	</div>

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
							<li><a href="indexAdmin.php">Inicio</a></li>
							<li><a href="perfilAdmin.php">Perfil</a></li>
							<li><a href="faq.html">FAQ</a></li>
						</ul>
					</nav>
				</div>
			</header>
			<?php 
			  if ($correo == $quiensoy){

			  	?>
			  	<div id="textoPr">
				

				<form action="modificarPerfiladmin_actualiz.php" method="post">

					<p><label for="clavenueva">Ingrese nueva contraseña: </label><input type="password" name="clavenueva" class="textarea" required></input></p>

					<input type="submit" value="Actualizar datos" id="btnSubmit"></input>


				</form>
				</div>
				<?php } else { ?>
				

				<script type="text/javascript">
                alert("Correo erroneo, por favor vuelva a ingresar su correo!");
                window.location="modificarPerfiladmin.php"
                </script>';
				

				<?php } 
				?>
				<?php
			}
			else{
				echo'<script type="text/javascript">
                alert("No existe usuario con dicho mail");
                window.location="modificarPerfiladmin.php"
                </script>';
			}
			?>
		</body>
		</html>