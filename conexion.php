<?php
/* Conectar a una base de datos de MySQL utilizando PDO */
$dsn = 'mysql:dbname=seguimiento_covid;host=localhost';
$usuario = 'root';
$contraseña = '';

try {
	$conexion = new PDO($dsn, $usuario, $contraseña);
	//echo "Conexion Exitosa";
} catch (PDOException $error) {
    echo 'Error al Conectarse a la BD: ' . $error->getMessage();
}

?>