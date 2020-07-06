<?php

/*

MARIO FERNANDEZ 2020-06-07
EJEMPLO QUERY
INSERT INTO `seguimiento_paciente` (`id`, `complemento_seg_id`, `fecha`, `hora`, `asintomatico`, `fiebre_cuantificada`, `tos`, `dificultad_respiratoria`, `odinofagia`,
`fatiga_adinamia`, `fecha_seguimiento`, `id_usuario`) VALUES (NULL, '1', '2020-06-07', '10:30:36', 'SI', 'NO', 'SI', 'NO', 'NO', 'NO', CURRENT_TIMESTAMP, '1');

*/

include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
foreach ($_REQUEST as $key) {
    if ($key == '') {
        die(json_encode('empty'));
    }
}

try {
    $complemento_seg_id = $_REQUEST['complemento_seg_id'];
    // $fecha_hora = date('Y-m-d :H:i:s');
    $asintomatico = $_REQUEST['asintomatico'];
    $fiebre_cuantificada = $_REQUEST['fiebre_cuantificada'];
    $tos = $_REQUEST['tos'];
    $dificultad_respiratoria = $_REQUEST['dificultad_respiratoria'];
    $odinofagia = $_REQUEST['odinofagia'];
    $fatiga_adinamia = $_REQUEST['fatiga_adinamia'];
    $cumple_criterio = $_REQUEST['cumple_criterio'];
    $comorbilidad = isset($_REQUEST['comorbilidad']) ? $_REQUEST['comorbilidad'] : null;
    $entrega_kits = isset ($_REQUEST ['entrega_kits']) ? $_REQUEST['entrega_kits'] : null;
    $fecha_entrega_kits = isset($_REQUEST['fecha_entrega_kits']) ? $_REQUEST['fecha_entrega_kits'] : null;
    $oxigeno_terapia = isset($_REQUEST['oxigeno_terapia']) ? $_REQUEST['oxigeno_terapia'] : null;
    $ambito_atencion = $_REQUEST['ambito_atencion'];
    $saturacion_oxigeno = $_REQUEST['saturacion_oxigeno'];
    $paciente_id = $_REQUEST['paciente_id'];
    $id_usuario = $_REQUEST['id_usuario'];
    $fecha_hora = date('Y-m-d :H:i:s');

    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("INSERT INTO seguimiento_paciente VALUES(NULL,?,NOW(),?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stm->execute(array(
        $complemento_seg_id,
        $asintomatico,
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
