<?php session_start();

include 'conexion.php';  // Funciona.

if (isset($_SESSION['usuario'])) { //si tiene una sesion iniciada lo enviamos al index, y el index tambien lo enviamos al contenido php
	header('Location: index.php');
}

$errores = '';
$resultado = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	// $password = $_POST['password'];
    $identificacion = $_POST['documento'];//recibimos la identificacion ingresa en el input
    $password = $_POST['password'];
    //$password = hash('sha512', $password);
  // echo "$identificacion - $password";

	$consulta = $conexion->prepare('SELECT * FROM usuarios WHERE identificacion = :identificacion AND clave = :clave');
	$consulta->execute(array(':identificacion' =>$identificacion , ':clave'=>$password));


    $resultado = $consulta->fetch();
    //var_dump($resultado);
	if ($resultado !== false) {
		$_SESSION['usuario'] = $identificacion;
		$_SESSION['nombre_apellido'] = $resultado['nombre_apellido'];
		$_SESSION['id'] = $resultado['id'];

            // echo "datos correctos";
            header('Location: index.php');

	} else {
		$errores .= 'Documento o Contraseña Incorrectas';
	}
}

if ($cerrar_sesion == 0);
$resultado = "sesion cerrada";

require 'views/login_view.php';

?>