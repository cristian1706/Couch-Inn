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
				<li><a href="agregar_tipo.php">Agregar tipo de couch</a></li>
				
			</ul>
		</nav>
	</div>
	<?php
			$sql = "SELECT * FROM tipo";
			$ver = mysqli_query($enlace,$sql);
			while($row = mysqli_fetch_array($ver)){
	?>
	<table class="table table-striped">
 					<thead style="font-weight: bold" class"center-block">
           <tr>
            <?php if ($row['estado'] == 'Activo') { ?> 
             <th>Nombre</th>
             <th>Estado</th>
             <th>Modificar</th>
             <th>Eliminar</th>
           </tr>
 				</thead>
				
				<td><?php echo $row['descripcion']; ?></td>
				<td><?php echo $row['estado']; ?></td>
				<td>
			 <form action="modificar_tipo_couch.php" method="POST">
			<input type="hidden" name="secreto" value="<?php echo $row['id_tipo']?>">
			<input type="submit" class="btn btn-default" value="Modificar" name="enviar">
			</form>
	</td>
	<td>
	<form action="eliminar_tipo_couch_actualiz.php" method="POST">
			<input type="hidden" name="elimino" value="<?php echo $row['id_tipo']?>">
			<input type="submit" class="btn btn-default" value="Eliminar" name="enviar">
			</form>
	</td>
			<?php } 
	 } ?>
</header>
</body>
</html>