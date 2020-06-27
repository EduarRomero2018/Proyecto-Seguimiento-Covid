<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales



if (isset($_REQUEST['identificacion'])  && $_REQUEST['identificacion'] == '') {
    die(json_encode('empty'));
}

$identificacion = $_REQUEST['identificacion'];

$stm = $conexion->prepare("SELECT * FROM pacientes WHERE numero_documento = ?");
$stm->execute(array($identificacion));

if ($stm->rowCount() == 0) {
    die(json_encode($stm->rowCount()));
}
$resultado = $stm->fetchAll(PDO::FETCH_OBJ);

foreach ($resultado as $key => $row)
    validar($conexion, $row->id);

$stm = $conexion->prepare("SELECT p.*,DATE(spt.fecha_programacion) AS fecha_programacion
FROM pacientes p
LEFT JOIN segunda_toma_muestra_control spt ON p.id = spt.pacientes_id
WHERE spt.pacientes_id = $row->id AND estado_proceso = 'ACTIVO'");
$stm->execute(array($identificacion));
$resultado = $stm->fetchAll(PDO::FETCH_OBJ);

if ($stm->rowCount() == 0) {
    die(json_encode('null'));
}
die(json_encode($resultado));

function validar($conexion, $id)
{
    $consulta = $conexion->prepare("SELECT *
        FROM segunda_toma_muestra_control
        WHERE pacientes_id = ? AND segunda_toma_muestra_control.estado_paciente != ''");
    $consulta->execute(array($id));

    if ($consulta->rowCount() == 0) {
        die(json_encode('null'));
    }

    $consulta = $conexion->prepare("SELECT *
        FROM pacientes
        WHERE id IN
        (SELECT pacientes_id FROM segunda_toma_muestra_control WHERE estado_proceso = 'ACTIVO' AND notificado = 'NO' AND pacientes_id = $id)");
    $consulta->execute(array($id));

    if ($consulta->rowCount() != 1) {
        die(json_encode('err'));
    }
}
