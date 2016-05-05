<?php 
	session_start();
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	if ($usuario == "grupo" && $clave == "holabruno"){
		$_SESSION['estado'] = "logeado"
		$msg = <a href=\"adentro.php\">Bienvenido " . $usuario . " </a>"
	}
	else {
		$msg = "Datos Erroneos. <a href=\"login.html\">Intentar de nuevo " .  </a>
	}
	<html>
	<head><title> Valida </title></head>
	<body>
	<p><?php echo $msg?></p>
	</body>
	</html>