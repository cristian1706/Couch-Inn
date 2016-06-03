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
		<a href="modificarPerfiladmin.php"> Modificar perfil</a><br>
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
				<li><a href="""eliminar_tipo.php">Eliminar tipo de couch</li>
				<li><a href="faq.html">FAQ</a></li>
			</ul>
		</nav>
		<h1 style="font-size: 170%;">Couchs</h1>
		
		<?php 
		
		$sql = "SELECT * FROM foto inner join couch on (couch.id_couch = foto.id_couch)
		inner join usuario on (couch.id_couch_usuario = usuario.id_usuario)";
		$resultado = mysqli_query($enlace,$sql);
		while($rows=mysqli_fetch_array($resultado)){
			
			?>

			<table class="table table-striped">
				<thead style="font-weight: bold" class"center-block">
					<tr>
						<th>Foto</th>
						<th>Título</th>
						<th>Detalle</th>
					</tr>
				</thead>	
				<td> <?php 
					if ($rows['id_nro_inscripcion'] != NULL){
						$imagen = $rows['imagen'];
						echo "<img src='./uploads/$imagen' height='200px' width='200px'>";
					}
					
					else {
						echo "<img src='./uploads/logocouchinn.png' height='200px' width='200px'></td>"; }?> </td>
						

						<td style="font-weight: bold"> <?php echo $rows['titulo']; ?></td>
						<td>
							<form action="detalle_couch_admin.php" method="POST">
								<input type="hidden" name="secreto" value="<?php echo $rows['id_couch']?>">
								<input type="submit" class="btn btn-default" value="Ver Couch" name="enviar">
							</form>
						</td>
						
						<?php } ?>	
					</div>
				</header>
			</body>
			</html>