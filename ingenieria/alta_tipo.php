<?php 
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
var_dump($_POST);
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

$valida = "SELECT descripcion FROM tipo WHERE '$descripcion' = descripcion";
$r = mysqli_query($enlace,$valida) or die ("Error: ".mysqli_error($enlace));

if ($r->num_rows == 0){
$sql = "INSERT INTO tipo (descripcion, estado) VALUES ('$descripcion', '$estado')";
$res=mysqli_query($enlace,$sql);
}
else {
	echo'<script type="text/javascript">
                alert("¡Tipo de couch existente! Por favor ingrese otro ");
                window.location="registro.html"
                </script>';
}
 /*<form action="alta_tipo.php" method="POST">
			<label for="descripcion">Descripcion:</label>
			<textarea name="descripcion" rows="3" cols="30" required ></textarea><br>
			<label for="estado">Estado:</label>
			<input name="estado" placeholder="Activo o Inactivo" required><br>
			<button type='submit' id='btnSubmit'>Agregar tipo</button> ESTO ES EL AGREGAR_TIPO.HTML*/
 ?>

 
<a href="index.php">Inicio</a>
<a href="agregar_couch.html">Intentar de nuevo</a>