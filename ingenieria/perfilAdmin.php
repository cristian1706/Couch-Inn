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

<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300italic,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<style>
		
	</style>
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
				<li><a href="indexAdmin.php">Inicio</a></li>
				<li><a href="agregar_tipo.php">Agregar tipo de couch</a></li>
				<li><a href="tipos_de_couch.php">Ver tipos de couch</a></li>
				
				
			</ul>
		</nav>
		<div id="textoPr">

			<?php
				$correo = $_SESSION['correo'];
			 $query = "SELECT * FROM administrador WHERE correo = '$correo'";
			 $r = mysqli_query($enlace,$query);
			 $rows = mysqli_fetch_array($r);
			?>
			<h4 style="font-size: bold 170%;">Nombre: <?php echo $rows['nombre']; ?><br></h4>
			<h4 style="font-size: bold 170%;">Apellido: <?php echo $rows['apellido']; ?><br></h4>
			<h4 style="font-size: bold 170%;">Telefono: <?php echo $rows['telefono']; ?><br></h4>
			<h4 style="font-size: bold 170%;">Fecha de Nacimiento: <?php echo $rows['nacimiento']; ?><br></h4>
			<h4 style="font-size: bold 170%;">correo: <?php echo $rows['correo']; ?><br></h4>
			<form action="modificarPerfilAdmin_carga.php" method="POST">
			<input type="submit" value="Modificar Perfil" id="btnSubmit3"></input>
			</form>
			<form action="modificarPerfilUsuarios.php" method="post">
			<input type="submit" value="Modificar perfil de los usuarios" id="btnSubmit3"></input>
		</div>
		
	</div>
</header>
</body>
</html>