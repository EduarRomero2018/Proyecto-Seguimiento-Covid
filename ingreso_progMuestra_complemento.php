<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

$_REQUEST['observacion'] = empty($_REQUEST['observacion'])? 'sin observacion':$_REQUEST['observacion'];  
$_REQUEST['motivo'] = empty($_REQUEST['motivo'])? 'sin motivo':$_REQUEST['motivo']; 
$_REQUEST['tipo_prueba'] = empty($_REQUEST['tipo_prueba'])? 'Null':$_REQUEST['motivo']; 

foreach ($_REQUEST as $key) {
    if ($key == '') {
        die(json_encode(array('empty',null)));
    }
}

try {
    $paciente_id = $_REQUEST['paciente_id'];
    $fecha_realizacion = $_REQUEST['fecha_realizacion'] . ' ' . date('h:i:s');
    $visita_exitosa = $_REQUEST['visita_exitosa'];
    $tipo_prueba = $_REQUEST['tipo_prueba'] == 'Null' ? null : $_REQUEST['tipo_prueba'];
    $observacion = $_REQUEST['observacion'];
    $motivo = $_REQUEST['motivo'];

    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("UPDATE prog_toma_muestra SET fecha_realizacion = ?, visita_exitosa = ?, tipo_prueba = ?, observacion = ?, motivo = ? WHERE pacientes_id = ?");
    $stm->execute(
        array(
            $fecha_realizacion,
            $visita_exitosa,
            $tipo_prueba,
            $observacion,
            $motivo,
            $paciente_id
        )
    );

    if ($stm->errorInfo()[2] != null) {
        $err = $stm->errorInfo()[2];
        die(json_encode(array('err', $err)));
    }

    if ($stm->rowCount() > 0) {
        die(json_encode(array('ok', null)));
    } else {
        die(json_encode(array('bad', null)));
    }
} catch (Exception $e) {
    die($e->getMessage('ERROR: ' + $e));
}
