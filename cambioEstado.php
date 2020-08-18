<?php 

require_once 'conexion.php';

if(empty($_REQUEST['fecha_f'])){
    die(json_encode('empty'));
}

$id = $_REQUEST['id'];
$fecha_f = $_REQUEST['fecha_f'] . ' ' . date('h:i:s');

$stm = $conexion->prepare("UPDATE pacientes SET estado_paciente = 'MUERTO', fecha_fallecimiento = ?  WHERE id = ?");
$stm->execute(array(
    $fecha_f,
    $id
));
die(json_encode('ok'));
?>