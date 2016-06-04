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
			</ul>
		</nav>
		<h1 style="font-size: 170%;">Couchs</h1>
		
		<?php 
		
		$sql = "SELECT * FROM usuario";
		$resultado = mysqli_query($enlace,$sql);
		while($rows=mysqli_fetch_array($resultado)){
			
			?>

			<table class="table table-striped">
				<thead style="font-weight: bold" class"center-block">
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Clave</th>
						<th>Correo</th>
						<th>Modificar</th>
					</tr>
				</thead>	
				<td> <?php echo $rows['nombre']; ?></td>
				<td> <?php echo $rows['apellido']; ?></td>
				<td> <?php echo $rows['clave']; ?></td>		
				<td> <?php echo $rows['correo']; ?></td>
						<td>
							<form action="modificarUsers_admin.php" method="POST">
								<input type="hidden" name="secreto" value="<?php echo $rows['id_usuario']?>">
								<input type="submit" class="btn btn-default" value="Modificar" name="enviar">
							</form>
						</td>
						
						<?php } ?>	
					</div>
				</header>
			</body>
			</html>