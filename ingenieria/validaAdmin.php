<?php 
	session_start();
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	$modo = $_POST['modo']
	if ($modo == "Administrador" && $usuario == "Emanuel" && $clave == "couchinn"){
		$_SESSION['estado'] = "logueado"
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