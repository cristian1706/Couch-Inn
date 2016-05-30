<?php 

$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}

var_dump($_POST);
$correo = $_POST['correo'];
$c = "SELECT correo FROM usuario WHERE correo = '$correo'";
$valida = mysqli_query($enlace,$c) or die ("Error: ".mysqli_error($enlace)); 
if($valida->num_rows > 0)
        {
              echo'<script type="text/javascript">
                alert(" ¡Este correo ya existe! Por favor, ingrese otro. ");
                window.location="registro.html"
                </script>';
        }
else{
	$contraseña = $_POST['contraseña'];        
	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
	for ($i=0; $i<strlen($contraseña); $i++){ 
		if (strpos($permitidos, substr($contraseña,$i,1))===false){ 
   	 	echo'<script type="text/javascript">
     	        alert("¡Clave invalida! Por favor ingrese una clave utilizando unicamente letras y numeros.");
                window.location="registro.html"
                </script>';
 		}
	}
 	$nombre = $_POST['nombre'];        
	$permitidos_nombre = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	for ($i=0; $i<strlen($nombre); $i++){ 
		if (strpos($permitidos_nombre, substr($nombre,$i,1))===false){ 
    		echo'<script type="text/javascript">
                alert("¡Nombre invalido! Por favor ingrese un nombre solo con letras");
                window.location="registro.html"
                </script>';
		}
	}
    $telefono = $_POST['telefono'];        
  $permitidos_telefono = "0123456789"; 
  for ($i=0; $i<strlen($telefono); $i++){ 
    if (strpos($permitidos_telefono, substr($telefono,$i,1))===false){ 
        echo'<script type="text/javascript">
                alert("¡Telefono invalido! Por favor ingrese un telefono solo con numeros");
                window.location="registro.html"
                </script>';
    }
  }
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$contraseña = $_POST['contraseña'];
var_dump($nombre);
   echo "holaaaaaaaaaaaa";
   $x = "INSERT INTO usuario (correo,nombre,apellido,telefono,nacimiento,clave) VALUES ('$correo','$nombre', '$apellido','$telefono', '$fecha','$contraseña')";
   echo $x;
	//$sql = mysqli_query($enlace, "INSERT into usuario (correo,nombre,apellido,telefono,nacimiento,clave,tipo) VALUES ($_POST['correo'], $_POST['nombre'], $_POST['apellido'],$_POST['telefono'], $_POST['fecha'],$_POST['clave']), $_POST['tipo']");
 	$sql=mysqli_query($enlace,$x);
 	/*if( $_query=mysqli_query($enlace,$sql)){
  	echo " Usuario agregado correctamente";
 	}

 	else{ echo "no se pudo agregar el usuario";}*/
}

?>
 <a href="index.php">Volver al Inicio</a>;<br>
 