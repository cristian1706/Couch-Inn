<?php 
	$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
	session_start();
	
	if (isset($_POST['correo']) && !empty($_POST['correo']) &&
		isset($_POST['clave']) && !empty($_POST['clave']))
	{
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];	
		
		$consulta = "SELECT correo,clave,nombre FROM usuario WHERE correo = '$correo' AND clave = '$clave'";
		$r = mysqli_query($enlace,$consulta) or die ("Error: ".mysqli_error($enlace));
		$sesion = mysqli_fetch_array($r);
		
		
		if ($r->num_rows == 0){
			echo'<script type="text/javascript">
                alert("¡Usuario o clave incorrectos! Por favor vuelva a intentarlo.");
                window.location="sesion.html"
                </script>';
            $_SESSION['estado'] = NULL;
		}
		else{
			$_SESSION['username'] = $correo;
			$_SESSION['estado'] = 'Autenticado';
			echo($sesion['nombre']);
			echo ($_SESSION['username']);
			echo ($sesion['clave']);
           
		}
	}
?>
 <a href="index.php">Volver al Inicio</a><br>