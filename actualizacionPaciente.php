<?php
session_start();
require_once 'conexion.php';

if (isset($_REQUEST['buscar']) && $_REQUEST['buscar'])
{
    $cedula = $_REQUEST['Bcedula'];

    $stm = $conexion->prepare("SELECT *
    FROM pacientes WHERE numero_documento = ?");
    $stm->execute(array($cedula));

    $DatosPaciente = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($DatosPaciente as $paciente ) {}
}

if(isset($_REQUEST['actualizar']) && $_REQUEST['actualizar'])
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
        regimen = ?
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

require_once 'views/actualizacionPacientes_view.php';