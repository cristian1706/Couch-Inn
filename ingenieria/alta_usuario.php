<?php 
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($enlace, $_POST['nombre']) : NULL;
$apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($enlace, $_POST['apellido']) : NULL;
$correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : NULL;
$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : NULL;


$sql = mysqli_query($enlace, "INSERT into usuario (NOMBRE,APELLIDO,MAIL,TELEFONO,NACIMIENTO,CLAVE) VALUES ('$nombre','$apellido','$correo', '$telefono', '$fecha', '$contraseña')");
 
 if( !$_query=mysqli_query($enlace,$sql)){
  echo " no se pudo agregar el usuario";
 }

 else{ echo "usuario agregado correctamente";}
 ?>
 <a href="index.php">Inicio</a>;