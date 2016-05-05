<?php 
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$capacidad = isset($_POST['capacidad']) ? $_POST['capacidad'] : NULL;
$ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : NULL;
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL;
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : NULL;

$sql = mysqli_query($enlace, "INSERT into couch (CAPACIDAD, UBICACION, DESCRIPCION, TITULO) VALUES ('$capacidad', '$ubicacion', '$descripcion', '$titulo')");

if( !$_query=mysqli_query($enlace,$sql)){
  echo " no se pudo agregar el usuario";
 }

 else{ echo "usuario agregado correctamente";}
 ?>
 
<a href="index.php">Inicio</a>;