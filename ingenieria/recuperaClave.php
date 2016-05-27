<?php 

$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

$correo = $_POST['correo'];
$sql = "SELECT CLAVE FROM usuario WHERE MAIL = '$correo'";
$r = mysqli_query($enlace,$sql) or die ("Error: ".mysqli_error($enlace));
$sesion = mysqli_fetch_array($r);


if ($r->num_rows != 0 ){
	echo $sesion['CLAVE'];	
}

else {
	echo "Correo incorrecto";
}


 ?>