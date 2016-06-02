<?php 
$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$titulo = $_POST['titulo'];        
	$permitidos_titulo = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ "; 
	for ($i=0; $i<strlen($titulo); $i++){ 
		if (strpos($permitidos_titulo, substr($titulo,$i,1))===false){ 
    		echo'<script type="text/javascript">
                alert("¡Titulo invalido! Por favor ingrese un titulo solo con letras");
                window.location="agregar_couch.html"
                </script>';
            }
        }
$descripcion = $_POST['descripcion'];        
	$permitidos_descripcion = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ "; 
	for ($i=0; $i<strlen($descripcion); $i++){ 
		if (strpos($permitidos_descripcion, substr($descripcion,$i,1))===false){ 
    		echo'<script type="text/javascript">
                alert("¡descripcion invalido! Por favor ingrese un descripcion solo con letras");
                window.location="agregar_couch.html"
                </script>';
            }
        }
$ubicacion = $_POST['ubicacion'];        
	$permitidos_ubicacion = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 "; 
	for ($i=0; $i<strlen($ubicacion); $i++){ 
		if (strpos($permitidos_ubicacion, substr($ubicacion,$i,1))===false){ 
    		echo'<script type="text/javascript">
                alert("¡ubicacion invalido! Por favor ingrese un ubicacion solo con letras");
                window.location="agregar_couch.html"
                </script>';
            }
        }
var_dump($_POST);
$cap = $_POST['capacidad'];
$ubicacion = $_POST['ubicacion'];
$descripcion = $_POST['descripcion'];
$titulo = $_POST['titulo'];
$tipo = $_POST['tipo'];

$sql = "SELECT id_tipo FROM tipo WHERE descripcion = '$tipo'";
$v = mysqli_query($enlace,$sql);
$fila = mysqli_fetch_array($v);
$id = $fila['id_tipo'];

$x = "INSERT INTO usuario (titulo,descripcion,ubicacion,capacidad,id_tipo_couch,id_couch_usuario) VALUES ('$titulo','$descripcion', '$ubicacion','$cap', '$id','3')";
echo ($x);
$sql=mysqli_query($enlace,$x) or die ("Error: ".mysqli_error($enlace);

/*if( !$_query=mysqli_query($enlace,$x)){
  die ("Error: ".mysqli_error($enlace);
 }

 else{ echo "Couch agregado correctamente";}*/
 ?>
 
<a href="index.php">Inicio</a>
<a href="agregar_couch.html">Intentar de nuevo</a>