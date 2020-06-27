<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
/*
foreach ($_REQUEST as $key) {
    if ($key == '' ) {


        die(json_encode('empty'));
    }
}
*/

try {

    $pacientes_id = $_REQUEST['paciente_id'];
    $usuario_id = $_REQUEST['usuario_id'];
    $visita_domiciliaria = $_REQUEST['visita_domiciliaria'];
    $estado_paciente = $_REQUEST['estado_paciente'];
    $fecha_fallecimiento = isset($_REQUEST['fecha_fallecimiento'])?$_REQUEST['fecha_fallecimiento']:'NULL';
    $fecha_programacion = isset($_REQUEST['fecha_programacion'])?$_REQUEST['fecha_programacion']:'NULL';

    $stm = $conexion->prepare("SELECT * FROM seguimiento_paciente WHERE id_pacientes = ?");

    //print_r($stm);

    $stm->execute(array($pacientes_id));

    if ($stm->rowCount() < 1) {
        die(json_encode(1));
    }

        $stm = $conexion->prepare("INSERT INTO segunda_toma_muestra_control VALUES(NULL, ?,?, NULL, NULL, NULL,?,?, ?, NULL,NOW(),NULL)");
    $stm->execute(array(
        $pacientes_id,
        $fecha_programacion,
        $visita_domiciliaria,
        $estado_paciente,
        $usuario_id
    ));

    if ($stm->errorInfo()[2] != null) {
        $err = $stm->errorInfo()[2];
        die(json_encode($err));
    }

    if ($stm->rowCount() < 1) {
        die(json_encode('bad'));
    } else {
        die(json_encode('ok'));
    }
} catch (Exception $e) {

    die($e->getMessage('ERROR: ' + $e));
}
