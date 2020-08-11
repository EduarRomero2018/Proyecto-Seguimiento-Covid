<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
foreach ($_REQUEST as $key) {
  if ($key == '') {
    die(json_encode('empty'));
  }
}

  try {

    $fecha_entrega_laboratorio = $_REQUEST['fecha_entrega_laboratorio'];
    $fecha_procesamiento = $_REQUEST['fecha_procesamiento'];
    $fecha_resultado = $_REQUEST['fecha_resultado'];
    $resultado = $_REQUEST['resultado'];
    $id = $_REQUEST['paciente_id'];
    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("UPDATE prog_toma_muestra SET fecha_entrega_lab = ?, fecha_procesamiento = ?,fecha_resultado = ?,resultado = ?,estado_proceso = 'FINALIZADO' WHERE pacientes_id = $id");
    //die("UPDATE prog_toma_muestra SET fecha_entrega_lab = '$fecha_entrega_laboratorio',fecha_resultado = '$fecha_resultado',resultado = '$resultado', notificado = '$notificado', fecha_notificacion = '$fecha_notificacion' WHERE pacientes_id = $id");
    $stm->execute(array(
        $fecha_entrega_laboratorio,
        $fecha_procesamiento,
        $fecha_resultado,
        $resultado
    ));

    if($stm->rowCount() < 1){
        die(json_encode('bad'));
    }else{
        die(json_encode('ok'));
    }

  }catch (Exception $e) {
    die(json_encode($e->getMessage('ERROR: ' + $e)));
  }
