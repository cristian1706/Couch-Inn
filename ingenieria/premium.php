<?php 
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
session_start();
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
	<div class="cerrar">
		<a href="modificarPerfil.php"> Modificar perfil</a><br>
		<a href="cerrarSesion.php">Cerrar Sesion</a>
	</div>
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
		<div id="textoPr">
			<h2>Tarjetas válidas: Visa</h2>
			<h3>El precio de ser premium se paga una vez, el valor es $..</h3>
			<form  action="EsPremium.php" method= "POST" onSubmit="confirm('Confirmar tarjeta')">
				
				<label for="num">Ingrese número de tarjeta:</label>
			    <input type="text" maxlength="16" name="tarjeta" required class="textarea"><br>
				<label for='fecha'>Fecha del dia de hoy:</label>
				<input type="date" name="fecha" class="textarea" required><br>
				<input type='submit' value='Enviar Datos' id='btnSubmit'>
				<input type='reset' value="Limpiar" id="btnLimpiar">
			</form>
		</div>
		
	</div>
</header>
</body>
</html>