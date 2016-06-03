<?php
$conexion = mysqli_connect( "localhost", "root", "", "couchinn");
if( (isset($_POST['correo'])) & (isset($_POST['clave'])) ){

    $email= $_POST['correo'];
    $clave= $_POST['clave'];
    $query= "SELECT correo,clave,nombre, apellido FROM usuario WHERE correo = '$email' AND clave = '$clave'";
    $resultado=mysqli_query($conexion, $query);
    $queryAdmin= "SELECT * FROM administrador WHERE correo = '$email' AND clave = '$clave'";
    $resultadoAdmin=mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultado) == 1) {

        session_start();
        $row= mysqli_fetch_array($resultado);
        
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['estado'] = 'Autenticado';
        echo'<script type="text/javascript">
                alert("Se ha iniciado sesion correctamente como usuario");
                window.location="perfil.php"
                </script>';
    // si no es usuario comun se fija si es admin

    } else {
        $queryAdmin = "SELECT * FROM administrador WHERE correo='". $email ."' AND clave='".$clave."'";
        $resultadoAdmin = mysqli_query($conexion, $queryAdmin);
        if (mysqli_num_rows($resultadoAdmin) == 1) {

            session_start();
            $rowAdmin = mysqli_fetch_array($resultadoAdmin);
            
            $_SESSION['correo'] = $rowAdmin['correo'];
            $_SESSION['clave'] = $rowAdmin['clave'];
            $_SESSION['estado'] = 'Autenticado';
            echo'<script type="text/javascript">
                alert("Se ha iniciado sesion correctamente como administrador");
                window.location="perfilAdmin.php"
                </script>';
        //si no es ninguno de los dos tira error

        } else {
            echo'<script type="text/javascript">
                alert("¡Usuario o clave incorrectos! Por favor vuelva a intentarlo.");
                window.location="sesion.html"
                </script>';
        }
    }
}
?>