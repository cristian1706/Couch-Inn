<?php 

$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
session_start();
$correo = $_POST['correo'];
$sql = "SELECT clave FROM usuario WHERE correo = '$correo'";
$r = mysqli_query($enlace,$sql) or die ("Error: ".mysqli_error($enlace));
$sesion = mysqli_fetch_array($r);


if ($r->num_rows != 0 ){
	mail($correo,"Contraseña",$sesion['clave']);	
}

else {
		echo'<script type="text/javascript">
                alert("¡Correo inexistente! Intentalo nuevamente");
                window.location="recuperarClave.html"
                </script>';
}


 ?>