<?php
session_start();
require_once 'conexion.php';

if (isset($_REQUEST['buscar']) && $_REQUEST['buscar'])
{
    $cedula = $_REQUEST['Bcedula'];

    $stm = $conexion->prepare("SELECT pacientes.id AS id_pacientes,tipo_documento,numero_documento,primer_nombre,
    segundo_nombre,primer_apellido,segundo_apellido,tipo_paciente,edad,unidad_medida,sexo,barrio,municipio,
    correo,telefono,telefono2,aseguradora,regimen,id_usuario_seguimiento,
    usuarios.id AS id_usuarios,usuarios.nombre_apellido,usuarios.sede 
    FROM pacientes 
    LEFT JOIN usuarios ON pacientes.id_usuario_seguimiento = usuarios.id 
    WHERE numero_documento = ?");
    $stm->execute(array($cedula));

    $DatosPaciente = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($DatosPaciente as $paciente ) {}

    if(!empty($DatosPaciente))
    {
        $stm = $conexion->prepare("SELECT * FROM usuarios WHERE roles = 'Auxiliar de seguimiento'");
        $stm->execute(array($cedula));
    
        $usuarios = $stm->fetchAll(PDO::FETCH_OBJ);
    
        $stm = $conexion->prepare("SELECT 
        DATE(fecha_programacion) AS fecha_programacion, 
        DATE(fecha_realizacion) AS fecha_realizacion,
        tipo_prueba,
        id
        FROM prog_toma_muestra WHERE pacientes_id = ?");
        $stm->execute(array($paciente->id_pacientes));
    
        $DatosProgTomaMuestra = $stm->fetchAll(PDO::FETCH_OBJ);
        foreach ($DatosProgTomaMuestra as $programacion ) {}
    }



}

if(isset($_REQUEST['actualizar-paciente']))
{
    $id = $_REQUEST['id'];
    $tipo_documento = $_REQUEST['tipo_documento'];
    $numero_documento = $_REQUEST['cedula'];
    $primer_nombre = $_REQUEST['primer_nombre'];
    $segundo_nombre = $_REQUEST['segundo_nombre'];
    $primer_apellido = $_REQUEST['primer_apellido'];
    $segundo_apellido = $_REQUEST['segundo_apellido'];
    $tipo_paciente = $_REQUEST['tipo_paciente'];
    $edad = $_REQUEST['edad'];
    $unidad_medida = $_REQUEST['unidad_medida'];
    $sexo = $_REQUEST['sexo'];
    $barrio = $_REQUEST['barrio'];
    $municipio = $_REQUEST['municipio'];
    $correo = $_REQUEST['correo'];
    $telefono = $_REQUEST['telefono'];
    $telefono2 = $_REQUEST['telefono2'];
    $aseguradora = $_REQUEST['aseguradora'];
    $regimen = $_REQUEST['regimen'];
    $id_usuario_seguimiento = empty($_REQUEST['id_usuario_seguimiento']) ? null : $_REQUEST['id_usuario_seguimiento'];


    $stm = $conexion->prepare(
        "UPDATE pacientes SET
        primer_nombre = ?,
        tipo_paciente = ?,
        segundo_nombre = ?,
        primer_apellido = ?,
        segundo_apellido = ?,
        tipo_documento = ?,
        numero_documento = ?,
        edad = ?,
        unidad_medida = ?,
        sexo = ?,
        barrio = ?,
        municipio = ?,
        correo = ?,
        telefono = ?,
        telefono2 = ?,
        aseguradora = ?,
        regimen = ?,
        id_usuario_seguimiento = ?
        WHERE id = ?");
    $stm->execute(array(
        $primer_nombre,
        $tipo_paciente,
        $segundo_nombre,
        $primer_apellido,
        $segundo_apellido,
        $tipo_documento,
        $numero_documento,
        $edad,
        $unidad_medida,
        $sexo,
        $barrio,
        $municipio,
        $correo,
        $telefono,
        $telefono2,
        $aseguradora,
        $regimen,
        $id_usuario_seguimiento,
        $id
    ));

    if($stm->errorInfo()[2] != null)
    {
        $error = $stm->errorInfo()[2];
        echo $error;
    }

    if($stm->rowCount() > 0){
        $success = 'ok';
    }
}

if(isset($_REQUEST['actualizar-programacion']))
{    
    $id = $_REQUEST['id'];
    $fecha_programacion = $_REQUEST['fecha_programacion'];
    $fecha_realizacion = empty($_REQUEST['fecha_realizacion']) ? null : $_REQUEST['fecha_realizacion'];
    $tipo_prueba = $_REQUEST['tipo_prueba'];

    if($fecha_realizacion == null)
    {
        $stm = $conexion->prepare("UPDATE prog_toma_muestra 
            SET fecha_programacion = ?, 
            fecha_realizacion = ?,
            visita_exitosa = null,
            tipo_prueba = null,
            observacion = null,
            motivo = null,
            fecha_entrega_lab = null,
            fecha_procesamiento = null,
            fecha_resultado = null,
            resultado = 3,
            estado_proceso = 'ACTIVO',
            notificado = 'NO',
            fecha_notificacion = null
            WHERE id = ?
        ");
        $stm->execute(array(
            $fecha_programacion,
            $fecha_realizacion,
            $id
        ));
    }
    else
    {
        $stm = $conexion->prepare("UPDATE prog_toma_muestra SET fecha_programacion = ?, fecha_realizacion = ?, tipo_prueba = ? WHERE id = ?");
        $stm->execute(array(
            $fecha_programacion,
            $fecha_realizacion,
            $tipo_prueba,
            $id
        ));
    }

    if($stm->errorInfo()[2] != null)
    {
        $error = $stm->errorInfo()[2];
        die($error);
    }

    if($stm->rowCount() > 0){
        $success = 'ok';
    }
}

require_once 'views/actualizacionPacientes_view.php';