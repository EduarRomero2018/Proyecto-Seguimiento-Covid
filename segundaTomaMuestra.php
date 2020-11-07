<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

try {

    $pacientes_id = $_REQUEST['paciente_id'];
    $usuario_id = $_REQUEST['usuario_id'];
    $visita_domiciliaria = $_REQUEST['visita_domiciliaria'];
    $fecha_programacion = $_REQUEST['fecha_programacion'];

    $stm = $conexion->prepare("SELECT * FROM seguimiento_paciente WHERE id_pacientes = ?");

    $stm->execute(array($pacientes_id));

    if ($stm->rowCount() < 1) {
        die(json_encode(1));
    }

    $stm = $conexion->prepare("INSERT INTO segunda_toma_muestra_control VALUES(NULL,?,?, NULL, NULL, NULL,?,?,NOW(),NULL,'ACTIVO','NO',NULL)");
    $stm->execute(array(
        $pacientes_id,
        $fecha_programacion,
        $visita_domiciliaria,
        $usuario_id
    ));

    if ($stm->errorInfo()[2] != null) {
        $err = $stm->errorInfo()[2];
        die(json_encode($err));
    }

    $stm = $conexion->prepare("UPDATE seguimiento_paciente SET actual = 'NO' WHERE id_pacientes = ? AND actual = 'SI' ");
    $stm->execute(array(
        $pacientes_id
    ));

    if ($stm->rowCount() < 1) {
        die(json_encode('bad'));
    } else {
        die(json_encode('ok'));
    }
} catch (Exception $e) {

    die($e->getMessage('ERROR: ' + $e));
}
