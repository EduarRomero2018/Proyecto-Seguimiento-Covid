<?php
include 'conexion.php';

$documento = $_REQUEST['documento'];

try {
    $consulta = $conexion->prepare(
        "SELECT paciente.id,programacion_toma_muestra.fecha_programacion
        FROM paciente
        RIGHT JOIN programacion_toma_muestra ON paciente.id = programacion_toma_muestra.paciente_id
        WHERE identificacion = ? AND programacion_toma_muestra.acepta_cita != '0'"
    );
    $consulta->execute(array(
        $documento
    ));

    if($consulta->rowCount() > 0){
        $array = [$consulta->rowCount(),'Este paciente ya tiene una fecha programada para la toma de muestra'];
        die(json_encode($array));
    }else {
        $array = [$consulta->rowCount(),'disponible'];
        die(json_encode($array));
    }
} catch (\Throwable $th) {
    die($e->getMessage('ERROR: ' + $e));
}

?>

