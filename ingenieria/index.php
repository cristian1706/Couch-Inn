<?php
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

session_start();
if(isset($_SESSION['username']) and $_SESSION['estado'] == 'Autenticado')
{
       echo ($_SESSION['username']);
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
				<li><a href="premium.php">Ser Premium</a></li><li>
				<li><a href="sesion.html">Iniciar Sesión</a></li>
				<li><a href="registro.html">Registrarse</a></li>
				<li><a href="faq.html">FAQ</a></li>
				<li><a href="agregar_tipo.html">Agregar tipo</a></li>
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
		 <form action="detalle_couch.php" method="POST">
			<input type="hidden" name="secreto" value="<?php echo $rows['id_couch']?>">
			<input type="submit" class="btn btn-default" value="Ver Couch" name="enviar">
			</form>
	</td>
	 
	<?php } ?>	
	</div>
</header>
</body>
</html>