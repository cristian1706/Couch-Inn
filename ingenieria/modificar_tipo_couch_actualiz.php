<?php
	$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}



	$desnueva = $_POST['nombrenuevo']; //nuevo nombre para el tipo
	$descr = $_POST['secreto'];
	$query = "UPDATE tipo SET descripcion = '$desnueva' WHERE descripcion = '$descr'";
	if($update = mysqli_query($enlace,$query)){
		echo'<script type="text/javascript">
                alert("Tipo de couch modificado correctamente");
                window.location="tipos_de_couch.php"
                </script>';
	}
	else {
		echo'<script type="text/javascript">
                alert("Error al modificar tipo de couch, por favor intentelo nuevamente");
                window.location="modificar_tipo_couch.php"
                </script>';
	}

?>
