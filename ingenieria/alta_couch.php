<?php 
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
var_dump($_POST);
$cap = $_POST['capacidad'];
var_dump($cap);
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];
$titulo = $_POST['titulo'];

$sql = "INSERT INTO couch (CAPACIDAD, UBICACION, DESCRIPCION, TITULO) VALUES ('$cap','$ubicacion','$descripcion','$titulo')";
$resultado = $enlace -> query($sql);

if( !$_query=mysqli_query($enlace,$resultado)){
  die ("Error: ".mysqli_error($enlace);
 }

 else{ echo "Couch agregado correctamente";}
 ?>
 
<a href="index.php">Inicio</a>
<a href="agregar_couch.html">Intentar de nuevo</a>