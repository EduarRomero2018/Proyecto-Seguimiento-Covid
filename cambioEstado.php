<?php 

require_once 'conexion.php';

if(empty($_REQUEST['fecha_f'])){
    die(json_encode('empty'));
}

$id = $_REQUEST['id'];

$stm = $conexion->prepare("UPDATE pacientes SET estado_paciente = 'MUERTO', fecha_fallecimiento = NOW()  WHERE id = ?");
$stm->execute(array($id));
die(json_encode('ok'));
?>