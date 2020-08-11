<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
foreach ($_REQUEST as $key){
    if ($key == '') {
        die(json_encode('empty'));
    }
}


try {
    $complemento_seg_id = $_REQUEST['complemento_seg_id'];
    // $fecha_hora = date('Y-m-d :H:i:s');
    $asintomatico = $_REQUEST['asintomatico'];
    $fecha_sintomas = $_REQUEST['fecha_sintomas'] == 'NULL' ? NULL:$_REQUEST['fecha_sintomas'];
    $fiebre_cuantificada = $_REQUEST['fiebre_cuantificada'];
    $tos = $_REQUEST['tos'];
    $dificultad_respiratoria = $_REQUEST['dificultad_respiratoria'];
    $odinofagia = $_REQUEST['odinofagia'];
    $fatiga_adinamia = $_REQUEST['fatiga_adinamia'];
    $cumple_criterio = $_REQUEST['cumple_criterio'];
    $comorbilidad = isset($_REQUEST['comorbilidad']) ? $_REQUEST['comorbilidad'] : null;
    $entrega_kits = isset ($_REQUEST ['entrega_kits']) ? $_REQUEST['entrega_kits'] : null;
    if (isset($_REQUEST['fecha_entrega_kits']) && $_REQUEST['fecha_entrega_kits'] != 'NULL') {
        $fecha_entrega_kits =  $_REQUEST['fecha_entrega_kits'];
    }else{
        $fecha_entrega_kits = null;
    }
    $oxigeno_terapia = isset($_REQUEST['oxigeno_terapia']) ? $_REQUEST['oxigeno_terapia'] : null;
    $tipo_flujo = isset($_REQUEST['tipo_flujo']) && $_REQUEST['tipo_flujo'] != 'NULL' ? $_REQUEST['tipo_flujo'] : null;
    $ambito_atencion = $_REQUEST['ambito_atencion'];
    $saturacion_oxigeno = $_REQUEST['saturacion_oxigeno'];
    $paciente_id = $_REQUEST['paciente_id'];
    $id_usuario = $_REQUEST['id_usuario'];
    $fecha_hora = date('Y-m-d :H:i:s');

    if (!is_numeric($saturacion_oxigeno)){
        die(json_encode('different'));
    }
    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("SELECT id FROM seguimiento_paciente WHERE id_pacientes = ? ORDER BY id DESC LIMIT 1");
    $stm->execute(array($paciente_id));

    $res = $stm->fetchAll(PDO::FETCH_OBJ);
    
    if($stm->rowCount() > 0){
        $id = $res[0]->id;
        $stm = $conexion->prepare("UPDATE seguimiento_paciente SET actual = 'no' WHERE id = ?");
        $stm->execute(array($id));
    }


    $stm = $conexion->prepare("INSERT INTO seguimiento_paciente VALUES(NULL,?,NOW(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'si',?,?)");
    $stm->execute(array(
        $complemento_seg_id,
        $asintomatico,
        $fecha_sintomas,
        $fiebre_cuantificada,
        $tos,
        $dificultad_respiratoria,
        $odinofagia,
        $fatiga_adinamia,
        $cumple_criterio,
        $comorbilidad,
        $entrega_kits,
        $fecha_entrega_kits,
        $oxigeno_terapia,
        $tipo_flujo,
        $ambito_atencion,
        $saturacion_oxigeno,
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
