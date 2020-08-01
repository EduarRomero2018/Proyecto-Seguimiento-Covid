<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

try {

    $pacientes_id = $_REQUEST['paciente_id'];
    $usuario_id = $_REQUEST['usuario_id'];
    $visita_domiciliaria = $_REQUEST['visita_domiciliaria'];
    $estado_paciente = $_REQUEST['estado_paciente'];
    $fecha_fallecimiento = $_REQUEST['fecha_fallecimiento'];
    $fecha_programacion = $_REQUEST['fecha_programacion'];
    $lugar_fallecimiento = $_REQUEST['lugar_fallecimiento'];

    $stm = $conexion->prepare("SELECT * FROM seguimiento_paciente WHERE id_pacientes = ?");

    $stm->execute(array($pacientes_id));

    if ($stm->rowCount() < 1) {
        die(json_encode(1));
    }

    if($fecha_fallecimiento == ''){
        $stm = $conexion->prepare("INSERT INTO segunda_toma_muestra_control VALUES(NULL,?,?, NULL, NULL, NULL,?,?,?,NULL,NULL,NOW(),NULL,'ACTIVO','NO',NULL)");
        $stm->execute(array(
            $pacientes_id,
            $fecha_programacion,
            $visita_domiciliaria,
            $estado_paciente,
            $usuario_id
        ));
    }else{
        $stm = $conexion->prepare("INSERT INTO segunda_toma_muestra_control VALUES(NULL,?,NULL, NULL, NULL, NULL,?,?,?,?,?,NOW(),NULL,'ACTIVO','NO',NULL)");
        $stm->execute(array(
            $pacientes_id,
            $visita_domiciliaria,
            $estado_paciente,
            $usuario_id,
            $fecha_fallecimiento,
            $lugar_fallecimiento
        ));
    }

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
