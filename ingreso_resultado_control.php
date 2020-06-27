<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

foreach ($_REQUEST as $key) {
    if ($key == '') {
        die(json_encode('empty'));
    }
}

try {

    $fecha_toma = $_REQUEST['fecha_toma'] .' '. date('h:i:s');
    $resultado = $_REQUEST['resultadoControl'];
    $id = $_REQUEST['paciente_id_2'];
    $notificado = $_REQUEST['notificado'];
    $fecha_notificacion = date('Y-m-d h:i:s');
    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("UPDATE segunda_toma_muestra_control SET fecha_de_toma = ?,resultado = ?,estado_proceso = 'FINALIZADO' ,notificado = ?,fecha_notificacion = ? WHERE pacientes_id = $id");
    $stm->execute(array($fecha_toma,$resultado,$notificado,$fecha_notificacion));

    if ($stm->errorInfo()[2] != null) {
        die(json_encode($stm->errorInfo()[2]));
    }

    if ($stm->rowCount() < 1) {
        die(json_encode('bad'));
    } else {
        die(json_encode('ok'));
    }
} catch (Exception $e) {
    die($e->getMessage('ERROR: ' + $e));
}
