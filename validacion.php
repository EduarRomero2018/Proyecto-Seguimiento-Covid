<?php
include 'conexion.php';

$documento = $_REQUEST['documento'];

try {
    $consulta = $conexion->prepare(
        "SELECT pacientes.id,prog_toma_muestra.fecha_programacion
        FROM pacientes
        RIGHT JOIN prog_toma_muestra
        ON pacientes.id = prog_toma_muestra.pacientes_id
        WHERE numero_documento= '$documento' AND prog_toma_muestra.acepta_visita != '0'"
    );
    $consulta->execute(/*array(
        $documento
    )*/);

    if($consulta->fetch() > 0){
        $array = [$consulta->rowCount(),'Este paciente ya tiene una fecha programada para la toma de muestra'];
        die(json_encode($stm));
    }else {
        $array = [$consulta->fetch(),'disponible'];
        die(json_encode($consulta));
    }
} catch (Exception $e) {
    die($e->getMessage('ERROR: ' + $e));
}