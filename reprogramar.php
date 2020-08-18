<?php 

require_once 'conexion.php';

if(empty($_REQUEST['fecha_r'])){
    die(json_encode('empty'));
}

$id = $_REQUEST['id'];
$fecha_r = $_REQUEST['fecha_r'] . ' ' . date('h:i:s');

$stm = $conexion->prepare("UPDATE prog_toma_muestra SET fecha_programacion = '$fecha_r'  WHERE pacientes_id = $id");
$stm->execute(array(
    $fecha_r,
    $id
));

if($stm->errorInfo()[2] != null){
    die(print_r($stm->errorInfo()));
}

die(json_encode('ok'));
?>