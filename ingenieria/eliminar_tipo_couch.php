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
				<li><a href="tipos_de_couch.php">Administrar tipos de couch</a></li>
				
			</ul>
		</nav>
	</div>
</header>
		<?php 
		$Idtipo = $_POST['elimino'];
		$query = "SELECT * FROM tipo WHERE id_tipo = '$Idtipo'";
		$r = mysqli_query($enlace,$query);
		$tipo = mysqli_fetch_array($r);
		
	?>
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
	
		<form action="eliminar_tipo_couch_actualiz.php" method="POST" onSubmit="return confirm('Desea eliminar este tipo de couch?')">
		<label for="descripcion">El nombre del tipo a eliminar es:&nbsp;<?php echo $tipo['descripcion'] ?> </label>
		<input type="text" name="tipo" class="textarea">
		<input type="hidden" name="elimino" value="<?php echo $tipo['id_tipo'] ?>">
		<input type="submit" value="Aceptar" id="btnSubmit2">
	</div>
</body>
</html>