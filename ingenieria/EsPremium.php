<?php 

$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
session_start();
if(isset($_SESSION['nombre']) and $_SESSION['estado'] == 'Autenticado')
{

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
   $str = $_POST['tarjeta'];
   $cant = strlen($str);
   if ($cant != 16){
    echo'<script type="text/javascript">
                alert("La cantidad de caracteres es invalida, por favor verifique su numero de tarjeta");
                window.location="premium.php"
                </script>';
   }
   else{
    $str = $_POST['codigo'];
    $cant = strlen($str);
    if ($cant != 4) {
      echo'<script type="text/javascript">
                alert("La cantidad de caracteres es invalida, por favor verifique el codigo de seguridad");
                window.location="premium.php"
                </script>';
    }
   }




   $correo = $_SESSION['correo']; //guardo el correo en $correo
    $query = "SELECT * FROM usuario WHERE correo = '$correo'";
    $res_query = mysqli_query($enlace,$query);
    $fila=mysqli_num_rows($res_query);
     if($fila['id_nro_inscripcion'] != null){
      echo'<script type="text/javascript">
     alert("Su usuario ya habia sido registrado como premium!");
   window.location="perfil.php"
      </script>';
    }
 else{

 	 
   $fecha = $_POST['fecha'];
   $x = "INSERT INTO premium (monto,fecha_inscripcion) VALUES ('100','$fecha')"; //agrego el premium a la bd
   $sql=mysqli_query($enlace,$x) or die ("Error: ".mysqli_error($enlace));
   

   $consulta = "SELECT nro_inscripcion FROM premium WHERE '$fecha' = fecha_inscripcion"; //busco al num de inscripcion
   $con=mysqli_query($enlace,$consulta) or die ("Error: ".mysqli_error($enlace));
   $res = mysqli_fetch_array($con);
   //var_dump($res);
   
   $num = $res['nro_inscripcion']; // guardo nro inscrip en num
  
   
   $act = "UPDATE usuario SET id_nro_inscripcion = '$num' WHERE correo = '$correo'"; //actualizo al usuario agregandole el num de inscripcion
   //var_dump($act);
   $val=mysqli_query($enlace,$act);
   //var_dump($val);
   echo'<script type="text/javascript">
   alert("¡Te has registrado como usuario premium!");
   window.location="perfil.php"
 </script>';
}

}
else{
  echo'<script type="text/javascript">
  alert("Para registrarte como premium debes iniciar sesion");
  window.location="sesion.html"
</script>';
}

?>