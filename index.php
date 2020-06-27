<?php session_start();                        //indicamos que vamos a trabajar con sessiones
if (isset($_SESSION['usuario'])) {           // si el usuario esta seteado
	header('location: contenido.php');       // quiere decir que tiene una session abierta y lo direccionamos al contenido.php
}                                             
else {     									 // si no
	header('Location: login.php');      //lo direccionamos para que se registre
}
?>