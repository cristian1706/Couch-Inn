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

		 		$idCouch=$_POST['secreto'];
				
		 		$q = "SELECT * FROM usuario INNER JOIN couch ON (couch.id_couch_usuario = usuario.id_usuario) WHERE couch.id_couch = '$idCouch'";
            	$valida = mysqli_query($enlace,$q);
            	$resul = mysqli_fetch_array($valida);	//CONSULTA POR EL USUARIO QUE SUBIO EL COUCH
            	//echo ($resul['nombre']);
            	//echo ($resul['apellido']);

				 $query="SELECT couch.*,tipo.descripcion FROM couch INNER JOIN tipo ON (couch.id_tipo_couch = tipo.id_tipo) WHERE couch.id_couch='$idCouch'";
				//var_dump($query);
				$r = mysqli_query($enlace,$query);	//CONSULTA POR LOS DATOS DEL COUCH
				while($fila=mysqli_fetch_array($r)){ ?> 

				<h4 style="font-size: bold 170%;">Titulo: <?php echo $fila['titulo']; ?><br></h4>
				<h4 style="font-size: bold 170%;">Descripcion: <?php echo $fila['2']; ?><br></h4>
				<h4 style="font-size: bold 170%;">Ubicacion: <?php echo $fila['ubicacion']; ?><br></h4>
				<h4 style="font-size: bold 170%;">Capacidad: <?php echo $fila['capacidad']; ?><br></h4>
				<h4 style="font-size: bold 170%;">Tipo: <?php echo $fila['descripcion']; ?><br></h4>
				<?php }

				$query_foto="SELECT imagen FROM foto WHERE id_couch='$idCouch'"; //CONSULTA POR LA IMAGEN DEL COUCH
            	$resultado_foto=mysqli_query($enlace, $query_foto);
            	$fotos = mysqli_fetch_array($resultado_foto);
            	$imagen = $fotos['imagen'];	?>
            	
            	
            	<h4 style="font-size: bold 170%;">Dueño: <?php echo $resul['nombre'];?> &nbsp; <?php echo $resul['apellido']; ?></h4><br>
            	
            	<?php echo "<img src='./uploads/$imagen' height='200px' width='200px'>" ?>
		 
	</div>
</body>
</html>
