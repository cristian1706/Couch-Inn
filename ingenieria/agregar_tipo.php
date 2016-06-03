<?php
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
session_start();
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
		<a href="modificarPerfiladmin.php"> Modificar perfil</a><br>
		<a href="cerrarSesion.php">Cerrar Sesion</a>
	</div>
<header>
	<hgroup>
	<div class="col-md-6 center-block quitar-float text-center">
		<img src="couchinn.png" width="500" height="100">
	</hgroup>
	
		<nav class="col-md-6 center-block quitar-float text-center">
			<ul>
				<li><a href="indexAdmin.php">Inicio</a></li>
				<li><a href="perfilAdmin.php">Perfil</a></li>
				<li><a href="tipos_de_couch.php">Ver tipos de couch</a></li>
				<li><a href="eliminar_couch.php">Eliminar tipo de couch</a></li>
				<li><a href="faq.html">FAQ</a></li>

			</ul>
		</nav>
		<div id="textoPr">
			
			<h2>Ingrrese un nuevo tipo de couch</h2><br>
			<form action="alta_tipo.php" method="POST">
			<label for="descripcion">Nombre tipo de couch:</label>
			<textarea name="descripcion" rows="2" cols="25" required class="textarea"></textarea><br><br>
			<label for="estado">Estado:</label>
			<input name="estado" placeholder="Activo o Inactivo" required class="textarea"><br>
			<button type='submit' id='btnSubmit'>Agregar tipo</button>
			
		</div>
	</div>
</header>
</body>
</html>