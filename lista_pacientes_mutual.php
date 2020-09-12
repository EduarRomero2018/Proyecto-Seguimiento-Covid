<?php

require_once 'conexion.php';

$fecha_realizacion = $_REQUEST['fecha_realizacion'];
$municipio = $_REQUEST['municipio'];
$proceso = $_REQUEST['proceso'];

switch ($proceso) {
    case 'seguimiento':
        $todos_pacientes = "SELECT CONCAT(p.primer_nombre, ' ', p.primer_apellido) AS 'Nombre_Completo',
        p.tipo_documento, p.numero_documento,
        fecha_programacion, DATE(fecha_realizacion) as fecha_realizacion , p.aseguradora, p.municipio
        FROM prog_toma_muestra ptm
        LEFT JOIN pacientes p ON ptm.pacientes_id = p.id
        WHERE DATE(fecha_realizacion) = ?
        AND fecha_programacion IS NOT NULL
        AND id_usuario_seguimiento IS NULL
        AND estado_paciente = 1
        AND p.aseguradora = 'MUTUAL SER'
        AND municipio = ?";
        break;
    
    case 'medico':
        $todos_pacientes = "SELECT CONCAT(p.primer_nombre, ' ', p.primer_apellido) AS 'Nombre_Completo',
        p.tipo_documento, p.numero_documento,
        fecha_programacion, DATE(fecha_realizacion) as fecha_realizacion , p.aseguradora, p.municipio
        FROM prog_toma_muestra ptm
        LEFT JOIN pacientes p ON ptm.pacientes_id = p.id
        WHERE DATE(fecha_realizacion) = ?
        AND fecha_programacion IS NOT NULL
        AND id_usuario_notificacion IS NULL
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