<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

  foreach ($_REQUEST as $key) {
    if($key == ''){
      die(json_encode('empty'));
    }
  }

  try {
    $paciente_id = $_REQUEST['paciente_id'];
    $acepta_visita = $_REQUEST['acepta_visita'];
    $fecha_programcion = $_REQUEST['fecha_programacion'];
    $fecha_realizacion = $_REQUEST['fecha_realizacion'];
    $programacion_atencion = $_REQUEST['programacion_atencion'];
    $nombre_programa = $_REQUEST['nombre_programa'];
    // $observacion = $_REQUEST['observacion'];
    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("INSERT INTO prog_toma_muestra VALUES(NULL,$paciente_id,'$acepta_visita','$fecha_programcion','$fecha_realizacion','$programacion_atencion','$nombre_programa',NULL,NULL,NULL,'Pendiente')");
    $stm->execute(
     /* array(
      $_REQUEST['paciente_id'],
      $_REQUEST['acepta_visita'],
      $_REQUEST['fecha_programacion'],

      $_REQUEST['fecha_realizacion'],
      $_REQUEST['programacion_atencion'],
      $_REQUEST['nombre_programa']
      // $_REQUEST['observacion']
    )
    */
      );
      //print_r($stm);
    if($stm->errorInfo()[2] != null){
      $err = $stm->errorInfo()[2];
      die(json_encode($err));
    }

    if($stm->execute()){
        die(json_encode('bad'));
    }else{
        die(json_encode('ok'));
    }

  }catch (Exception $e) {
    die($e->getMessage('ERROR: ' + $e));
  }
