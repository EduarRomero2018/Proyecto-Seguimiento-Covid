<?php 

require_once 'conexion.php';

$id = $_REQUEST['id'];

$stm = $conexion->prepare("UPDATE pacientes SET estado_paciente = 'MUERTO', fecha_fallecimiento = NOW()  WHERE id = ?");
$stm->execute(array($id));

?>