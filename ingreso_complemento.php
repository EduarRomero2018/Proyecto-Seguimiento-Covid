<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

foreach ($_REQUEST as $key) {
    if ($key == '') {
        die(json_encode('empty'));
    }
}

try {

    $atencion_medica_domiciliaria = $_REQUEST['atencion_medica_domiciliaria'];
    $fecha_atencion_medica_domiciliaria = $_REQUEST['fecha_atencion_medica_domiciliaria'];
    $realizacion_hemograma = $_REQUEST['realizacion_hemograma'];
    $paises_ciudades = $_REQUEST['paises_ciudades'];
    $antecedentes_viaje = $_REQUEST['antecedentes_viaje'];
    $id_usuario = $_REQUEST['id_usuario'];
    $paciente_id = $_REQUEST['paciente_id'];

    $stm = $conexion->prepare("SELECT * FROM complemento_seg WHERE id_paciente = ?");
    $stm->execute(array($paciente_id));

    if ($stm->rowCount() > 0) {
        die(json_encode(1));
    }

    $stm = $conexion->prepare("SELECT * FROM prog_toma_muestra WHERE pacientes_id = ?");
    $stm->execute(array($paciente_id));

    if($stm->rowCount() == 0){
        die(json_encode(2));
    }

    $stm = $conexion->prepare("INSERT INTO complemento_seg VALUES(NULL,?,?,?,?,?,?,?)");
    $stm->execute(array(
        $antecedentes_viaje,
        $paises_ciudades,
        $atencion_medica_domiciliaria,
        $fecha_atencion_medica_domiciliaria,
        $realizacion_hemograma,
        $id_usuario,
        $paciente_id
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
