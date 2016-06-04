<?php 

$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$correo = $_POST['correo'];
$sql = "SELECT clave FROM usuario WHERE correo = '$correo'";
$r = mysqli_query($enlace,$sql) or die ("Error: ".mysqli_error($enlace));
$sesion = mysqli_fetch_array($r);


if ($r->num_rows == 1 ){
		
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
						<img src="couchinn.png" width="500" height="100">
					</hgroup>

					<nav class="col-md-6 center-block quitar-float text-center">
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="sesion.html">Iniciar Sesión</a></li>
							<li><a href="registro.html">Registrarse</a></li>
							
						</ul>
					</nav>
				</div>
			</header>

			<?php
			
				$contra = $sesion['clave'];
				echo'<script type="text/javascript">
				alert("¡Se le ha enviado su contraseña a su correo! Constraseña: '.$contra.'");

				</script>';
			?>

			
			  	<div id="textoPr">
			  	<h2>Recuperar contraseña</h2><br>
				<form action="modificarClave_actualiz.php" method="post">
					<?php //echo "Su antigua contraseña era: ";printf($sesion['clave']);?>
					<label for="contraseña">Ingrese su nueva contraseña:</label><input type="password" name="contraseña" required class="textarea"></input>
					<input type="submit" value="Actualizar" id="btnSubmit2"></input>

					<input type="hidden" name="correo" value="<?php echo $correo;?>"></input>

				</form>

			
				
				

<?php
}
else {
	echo'<script type="text/javascript">
                alert("¡Su correo no esta registrado en nuestro sistema!");
                window.location="recuperarClave.html"
                </script>';
}
?>