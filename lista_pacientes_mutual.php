<?php

require_once 'conexion.php';

$fecha_realizacion = $_REQUEST['fecha_realizacion'];
$municipio = $_REQUEST['municipio'];
$proceso = $_REQUEST['proceso'];
$asignacion = $_REQUEST['tipo_asignacion'];

switch ($proceso) {
    case 'seguimiento':

        if ($asignacion == 1) {
            $tabla = 'prog_toma_muestra';
            $campo_seguimiento = 'id_usuario_seguimiento';
        } else {
            $tabla = 'segunda_toma_muestra_control_2';
            $campo_seguimiento = 'id_usuario_seguimiento_2';
        }

        $todos_pacientes = "SELECT CONCAT(p.primer_nombre, ' ', p.primer_apellido) AS 'Nombre_Completo',
        p.tipo_documento, p.numero_documento,
        fecha_programacion, DATE(fecha_realizacion) as fecha_realizacion , p.aseguradora, p.municipio
        FROM $tabla ptm
        LEFT JOIN pacientes p ON ptm.pacientes_id = p.id
        WHERE DATE(fecha_realizacion) = ?
        AND fecha_programacion IS NOT NULL
        AND $campo_seguimiento IS NULL
        AND estado_paciente = 1
        AND p.aseguradora = 'MUTUAL SER'
        AND municipio = ?";
        break;
    
    case 'medico':

        if ($asignacion == 1) {
            $tabla = 'prog_toma_muestra';
            $campo_medico = 'id_usuario_notificacion';
        } else {
            $tabla = 'segunda_toma_muestra_control_2';
            $campo_medico = 'id_usuario_notificacion_2';
        }

        $todos_pacientes = "SELECT CONCAT(p.primer_nombre, ' ', p.primer_apellido) AS 'Nombre_Completo',
        p.tipo_documento, p.numero_documento,
        fecha_programacion, DATE(fecha_realizacion) as fecha_realizacion , p.aseguradora, p.municipio
        FROM $tabla ptm
        LEFT JOIN pacientes p ON ptm.pacientes_id = p.id
        WHERE DATE(fecha_realizacion) = ?
        AND fecha_programacion IS NOT NULL
        AND $campo_medico IS NULL
        AND estado_paciente = 1
        AND ptm.resultado = 1
        AND p.aseguradora = 'MUTUAL SER'
        AND municipio = ?";
        break;
}


$stm = $conexion->prepare($todos_pacientes);
$stm->execute(array($fecha_realizacion,$municipio));

if($stm->rowCount() == 0){
    die(json_encode(array('!found',null)));
}

$result_pacientes = $stm->fetchAll(PDO::FETCH_OBJ);

die(json_encode(array('ok',$result_pacientes)));