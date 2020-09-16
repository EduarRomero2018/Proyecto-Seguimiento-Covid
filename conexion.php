<?php
/* Conectar a una base de datos de MySQL utilizando PDO */
$dsn = 'mysql:dbname=seguimiento_covid;host=sios1.caminosips.com';
$usuario = 'seguimiento_covid';
$contraseña = 'Lafacil2017';

try {
	$conexion = new PDO($dsn, $usuario, $contraseña);
	//echo "Conexion Exitosa";
} catch (PDOException $error) {
   // echo 'Error al Conectarse a la BD: ' . $error->getMessage();
}

?>