<?php 
require_once 'conexion.php';

if($_REQUEST['llamada'] == 'No'){
    
    $paciente_id = $_REQUEST['paciente_id'];

    if(isset($_REQUEST['stm']) && $_REQUEST['stm'] == 'stm')
    {
        $tabla = 'segunda_toma_muestra_control_2';
    }else{
        $tabla = 'prog_toma_muestra';
    }

    $sql = "UPDATE $tabla SET estado_proceso = 'FINALIZADO', notificado = 'SI', fecha_notificacion = NOW() WHERE pacientes_id = $paciente_id";
    $stm = $conexion->prepare($sql);
    $stm->execute();

    if ($stm->rowCount() > 0) {
        die(json_encode('ok'));
    }else {
        print_r($stm->errorInfo());
    }

}else{
    
    $id_usuario = $_REQUEST['id_usuario'];
    $rol_usuario = $_REQUEST['rol_usuario'];
    $nombre_paciente = $_REQUEST['nombre_paciente'];
    $telefono_paciente = empty($_REQUEST['telefono_paciente']) ? null : $_REQUEST['telefono_paciente'];
    $telefono2_paciente = empty($_REQUEST['telefono2_paciente']) ? null : $_REQUEST['telefono2_paciente'];
    $motivo = $_REQUEST['motivo'];

    $sql = "INSERT INTO llamadas_fallidas VALUES(NULL,?,?,?,?,?,?,NOW())";

    $stm = $conexion->prepare($sql);
    $stm->execute(array(
        $id_usuario,
        $rol_usuario,
        $nombre_paciente,
        $telefono_paciente,
        $telefono2_paciente,
        $motivo
    ));

    if ($stm->rowCount() > 0) {
        die(json_encode('ok'));
    }else {
        print_r($stm->errorInfo());
    }
}