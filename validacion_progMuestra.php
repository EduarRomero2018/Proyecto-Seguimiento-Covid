<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

foreach ($_REQUEST as $key) {
  if ($key == '') {
    die(json_encode('empty'));
  }
}

try {
  $paciente_id = $_REQUEST['paciente_id'];
  //comprobamos que los campos no esten vacios

  $stm = $conexion->prepare("SELECT DATE(fecha_programacion) AS fecha_programacion FROM prog_toma_muestra WHERE pacientes_id = ?");
  $stm->execute(
    array(
      $paciente_id
    )
  );

  if ($stm->errorInfo()[2] != null) {
    $err = $stm->errorInfo()[2];
    die(json_encode(array('err', $err)));
  }

  if ($stm->rowCount() == 0) {
    $res = $stm->fetchAll(PDO::FETCH_OBJ);
    die(json_encode(array('!found', null)));
  }

  $stm = $conexion->prepare("SELECT DATE(fecha_programacion) AS fecha_programacion FROM prog_toma_muestra WHERE pacientes_id = ? AND fecha_realizacion IS NULL ");
  $stm->execute(
    array(
      $paciente_id
    )
  );

  if ($stm->rowCount() == 1) {
    $res = $stm->fetchAll(PDO::FETCH_OBJ);
    die(json_encode(array('ok', $res)));
  } else {
    die(json_encode(array('bad', null)));
  }
} catch (Exception $e) {
  die($e->getMessage('ERROR: ' + $e));
}
