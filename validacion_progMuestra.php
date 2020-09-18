<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

foreach ($_REQUEST as $key) {
  if ($key == '') {
    die(json_encode(array('empty',null)));
  }
}

try {
  $numero_documento = $_REQUEST['identificacion'];
  $tabla = $_REQUEST['tabla'];
  //comprobamos que los campos no esten vacios
  $stm = $conexion->prepare(
    "SELECT 
    id
    FROM pacientes
    WHERE numero_documento = ?"
  );
  $stm->execute(
    array(
      $numero_documento
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
  
  $res = $stm->fetch();
  $paciente_id = $res['id'];
  
  $stm = $conexion->prepare(
    "SELECT 
    id
    FROM $tabla
    WHERE pacientes_id = ? AND fecha_realizacion IS NOT NULL"
  );
  $stm->execute(
    array(
      $paciente_id
    )
  );

  if ($stm->errorInfo()[2] != null) {
    $err = $stm->errorInfo()[2];
    die(json_encode(array('err', $err)));
  }
  
  if ($stm->rowCount() != 0) {
    $res = $stm->fetchAll(PDO::FETCH_OBJ);
    die(json_encode(array('found', null)));
  }

  $stm = $conexion->prepare(
    "SELECT 
    DATE(fecha_programacion) AS fecha_programacion, DATE(fecha_realizacion) AS fecha_realizacion,
    pacientes.id,pacientes.primer_nombre,pacientes.numero_documento
    FROM $tabla
    RIGHT JOIN pacientes ON  pacientes.id = pacientes_id
    WHERE pacientes_id = ? AND fecha_realizacion IS NULL"
  );
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
