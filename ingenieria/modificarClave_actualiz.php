﻿<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300italic,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<title>Couch Inn</title>
</head>
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
							
						</ul>
					</nav>
				</div>
			</header>

	<?php
	$conexion=mysqli_connect("localhost","root","","couchinn") or
	die("Problemas con la conexión");
	
	$correo=$_POST['correo'];
	$clave=$_POST['contraseña'];
	mysqli_query($conexion, "UPDATE usuario
		set clave='$clave'WHERE correo='$correo'");
	?>

	<script type="text/javascript">
                alert("¡La constraseña ha sido modificada con exito!");
                window.location="sesion.html"
                </script>';
	<br><br>
</body>
</html>