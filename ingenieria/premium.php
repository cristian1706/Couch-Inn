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
				
			</ul>
		</nav>
		<div id="textoPr">

			<script language="Javascript"> 
				function confirmar(){ 
					confirmar=confirm(); 
					if (confirmar) 
						// si pulsamos en aceptar
						
						header("Location: index.php");
					else 
						// si pulsamos en cancelar
						 
						header("Location: index.php");
					} 
			</script>
			
			<h3>El precio de ser premium se paga sólo una vez, el valor es $100</h3>
			<form  action="EsPremium.php" method= "POST" onSubmit="return confirm('Confirmar tarjeta')">
				<label for="tarjeta">Elija tipo de tarjeta:</label>
				<select name="tipo" class="textarea" required>
					
					<option>Master Card</option>
					<option>Santander</option>
					<option>Galicia</option>
					<option>City Bank</option>
					<option>Frances</option>
					<option>Provincia</option>
					<option>Banco Industrial</option>
				</select>
				<label for="num">Ingrese número de tarjeta:</label>
			    <input type="text"  minlength="16" maxlength="16" name="tarjeta" required class="textarea"><br>
				<label for='fecha'>Fecha de vencimiento:</label>
				<input type="date" name="fecha" class="textarea" required><br>
				<label for="codigo">Codigo de Seguridad:</label>
				<input type="password" minlength="4" maxlength="4" name="codigo" required class="textarea"><br>
				<input type='submit' value='Enviar Datos' id='btnSubmit2'>
				<input type='reset' value="Limpiar" id="btnSubmit2">
			</form>
		</div>
		
	</div>
</header>
</body>
</html>