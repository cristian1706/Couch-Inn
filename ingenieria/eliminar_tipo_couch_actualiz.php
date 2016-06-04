<?php
	$enlace = mysqli_connect("localhost", "root", "", "couchinn");

/* comprobar la conexión */
if ($enlace->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
session_start();
if(isset($_SESSION['correo']) and $_SESSION['estado'] == 'Autenticado'){
	


	$idTipo = $_POST['elimino'];
	$result = mysqli_query($enlace, "SELECT * FROM couch INNER JOIN tipo ON (couch.id_tipo_couch = tipo.id_tipo) WHERE id_tipo = '$idTipo'");
	if(mysqli_num_rows($result)){
		$query = mysqli_query($enlace,"UPDATE tipo SET estado = 'Inactivo' WHERE id_tipo = '$idTipo'");
		echo'<script type="text/javascript">
                alert("Existen publicaciones de este tipo de couch, el mismo se ocultará pero no se eliminará");
                window.location="tipos_de_couch.php"
                </script>';
	}
	else{
		$consulta1= "DELETE FROM tipo WHERE id_tipo = '$idTipo'";
		$res=mysqli_query($enlace,$consulta1);
		if($res){
			echo'<script type="text/javascript">
       		 alert("Tipo de couch eliminado correctamente");
       		 window.location="tipos_de_couch.php"
       		 </script>';
		}
	}
}
?>