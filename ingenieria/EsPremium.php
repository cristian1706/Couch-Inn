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

 	 $tarjeta = $_POST['tarjeta'];        
  	$permitidos_tarjeta = "0123456789"; 
 	 for ($i=0; $i<strlen($tarjeta); $i++){ 
  	  	if (strpos($permitidos_tarjeta, substr($tarjeta,$i,1))===false){ 
       		 echo'<script type="text/javascript">
                alert("¡tarjeta invalida! Por favor ingrese un tarjeta solo con numeros");
                window.location="premium.php"
                </script>';
   	 	}
 	 }
 	 $fecha = $_POST['fecha'];
 	 $x = "INSERT INTO premium (monto,fecha_inscripcion) VALUES ('40','$fecha')"; //agrego el premium a la bd
 	 $sql=mysqli_query($enlace,$x) or die ("Error: ".mysqli_error($enlace));
 	 

 	 $consulta = "SELECT nro_inscripcion FROM premium WHERE '$fecha' = fecha_inscripcion"; //busco al num de inscripcion
 	 $con=mysqli_query($enlace,$consulta) or die ("Error: ".mysqli_error($enlace));
 	 $res = mysqli_fetch_array($con);
 	 //var_dump($res);
 	
 	 $num = $res['nro_inscripcion']; // guardo nro inscrip en num
 	 $correo = $_SESSION['username']; //guardo el correo en $correo
 	 
 	 $act = "UPDATE usuario SET id_nro_inscripcion = '$num' WHERE correo = '$correo'"; //actualizo al usuario agregandole el num de inscripcion
 	 //var_dump($act);
 	 $val=mysqli_query($enlace,$act);
 	 //var_dump($val);
 	 echo'<script type="text/javascript">
                alert("¡Te has registrado como usuario premium!");
                window.location="index.php"
                </script>';


}
else{
	echo'<script type="text/javascript">
                alert("Para registrarte como premium debes iniciar sesion");
                window.location="sesion.html"
                </script>';
}

?>