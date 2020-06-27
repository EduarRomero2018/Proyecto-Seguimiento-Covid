<?php
include 'conexion.php';  // Funciona.

//variables globales que recogen al final el estado del condicional
$errores = '';
$exito = '';

$ini = isset($_REQUEST['p']) ? $_REQUEST['p'] : 0;
$fin = 2;
$ini = $ini != 0 ? ($ini - 1) * $fin : 0;

$sql = "SELECT * FROM paciente LIMIT $ini, $fin";

$consulta = $conexion->prepare($sql);
$consulta->execute();

$res = $consulta->fetchAll(PDO::FETCH_OBJ);
// print_r($res);

$query = $conexion->prepare("SELECT * FROM paciente");
$query->execute();

$count = $query->rowCount();

if($consulta->errorInfo()[2] != null){
    $error = $consulta->errorInfo();
}

if($consulta->rowCount() < 0){
    echo('No hay pacientes registrados');
}

include 'views/listar_pacientes_view.php';