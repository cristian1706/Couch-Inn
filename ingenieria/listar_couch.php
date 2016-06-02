<?php
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
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
		<img src="logocouchinn.png" width="500" height="100">
	</hgroup>
	
		<nav class="col-md-6 center-block quitar-float text-center">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="">Perfil</a></li><li>
				<li><a href="sesion.html">Iniciar Sesión</a></li>
				<li><a href="registro.html">Registrarse</a></li>
				<li><a href="faq.html">FAQ</a></li>
			</ul>
		</nav>
	</div>
</header>
	<div id="textoPr">
		
	<?php
			$query = "SELECT * FROM tipo";
			$q = mysqli_query($enlace,$query);
			while($rows = mysqli_fetch_array($q)){ ?>

				<h4 style="font-size: bold 170%;">Nombre: <?php echo $rows['descripcion']; ?></h4>
				<form action="modificar_tipo.php" method="POST">
				<!--<input type="submit" value="modificar" id="btnSubmit"> -->

		<?php	}



	?>

	</div>
</body>
</html>
