<?php
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}



function consulta_nombre(){
$consulta = "SELECT NOMBRE FROM usuario";
$resultado = $enlace -> query($consulta);
$fila = mysqli_fetch_array($resultado);
echo $fila['NOMBRE']."<br>";
}
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
<header>
	<hgroup>
	<div class="col-md-6 center-block quitar-float text-center">
		<h1 class="Indie-flower grande verde">Couch Inn</h1>
	</hgroup>
	
		<nav class="col-md-6 center-block quitar-float text-center">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="contacto.html">Contacto</a></li><li>
				<li><a href="sesion.html">Iniciar Sesión</a></li>
				<li><a href="registro.html">Registrarse</a></li>
			</ul>
		</nav>
		<div>
			<form name="premium" action="premium.php">
			<input type="submit" value="Quiero ser Premium" id="BtnSubmit">
			</form>
			<form action="agregar_couch.html">
			<input type="submit" value="Agregar Couch" id="BtnSubmit">
		</div>
	</div>
</header>
</body>
</html>