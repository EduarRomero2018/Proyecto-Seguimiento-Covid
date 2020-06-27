<?php session_start();

include 'conexion.php';  // Funciona.
 if (isset($_SESSION['usuario'])) { //siempre y cuando tenga una sesion iniciada lo enviamos al contenido
	include 'reportes.php';
	//include 'listar_pacientes.php';
	require 'views/contenido_view.php';

 } else {

 	header('Location: login.php'); //sino lo enviamos al login para que
 }
//echo "impresion de contenido";
 //VALIDAMOS QUE LA IDENTIFICACION NO EXISTA EN LA BD

?>

