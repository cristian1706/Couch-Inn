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
		<img src="uploads/logocouchinn.png" width="500" height="100">
	</hgroup>
	
		<nav class="col-md-6 center-block quitar-float text-center">
			<ul>
				<li><a href="indexSesion.php">Inicio</a></li>
				<li><a href="perfil.php">Perfil</a></li><li>

				
			</ul>
		</nav>
	</div>
</header>
<?php $query = mysqli_query($enlace,"SELECT descripcion FROM tipo");
	  
 ?>

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
	<div id="textoPr">
		<form action="alta_couch.php" method="POST" onSubmit="return confirm('Confirmar Couch')" enctype="multipart/form-data">
		
		<label for= 'titulo'>Título:</label>
		<input type='text'  name="titulo" minlength="3" maxlength="30" placeholder="Nombre de su couch" required class="textarea">
		<label for= 'ubicacion'>Ubicación:</label>
		<input type='text'  name="ubicacion" minlength="3" maxlength="30" placeholder="Ciudad de su couch" required class="textarea">
		<label for= 'descripcion'>Descripción:</label>
		<input type= 'textarea' name="descripcion" minlength="3" maxlength="200" placeholder="Breve descripcion" required class="textarea">
		<label for= 'capacidad'>Capacidad:</label>
		<input type='number' min="1" max="100" name="capacidad" required class="textarea"><br>		
		<label for="foto">Agregar Foto:</label>
		<input type="file" name="foto" id="btnSubmit2">
		<label for="tipo">Seleccionar tipo:</label>
		<select name="tipo" class="textarea" required>
			<?php while ($rows = mysqli_fetch_array($query)){ ?>
			 <option value="<?php echo $rows['descripcion'] ?>" >
       		 <?php echo $rows['descripcion']; ?>
       		 </option>
       		 <?php } ?> 
		</select>
		<input type='submit' value='Enviar Datos' id='btnSubmit2'>
		<input type='reset' value="Limpiar" id="btnSubmit2">
		</form>
	</div>
</body>
</html>