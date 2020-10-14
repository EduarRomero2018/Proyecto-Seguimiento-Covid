<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales
session_start();
  $id_usuario = $_SESSION['id'];
  foreach ($_REQUEST as $key) {
    if($key == ''){
      die(json_encode('empty'));
    }
  }

  try {
    $paciente_id = $_REQUEST['paciente_id'];
    $acepta_visita = $_REQUEST['acepta_visita'];
    $fecha_programcion = $_REQUEST['fecha_programacion'] . ' ' . date('h:i:s');
    $programacion_atencion = $_REQUEST['programacion_atencion'];
    $nombre_programa = $_REQUEST['nombre_programa'];
    //comprobamos que los campos no esten vacios

    $stm = $conexion->prepare("INSERT INTO prog_toma_muestra VALUES(NULL,?,?,?,?,NULL,NULL,NULL,NULL,NULL,?,?,NULL,NULL,NULL,'Pendiente','ACTIVO','NO',NULL,NOW())");
    $stm->execute(
      array(
        $id_usuario,
        $paciente_id,
        $acepta_visita,
        $fecha_programcion,
        $programacion_atencion,
        $nombre_programa
    ));
  
    if($stm->errorInfo()[2] != null){
      $err = $stm->errorInfo()[2];
      die(json_encode($err));
    }

    if($stm->rowCount() == 1){
      die(json_encode('ok'));
    }else{
      die(json_encode('bad'));
    }

  }catch (Exception $e) {
    die($e->getMessage('ERROR: ' + $e));
  }
