<?php
include 'conexion.php';  // Funciona.
//APERTURA DE VARIABLES Datos Personales

foreach ($_REQUEST as $key) {
  if ($key == '') {
    die(json_encode('empty'));
  }
}

try {
  $numero_documento = $_REQUEST['identificacion'];
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
    FROM prog_toma_muestra
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
    DATE(fecha_programacion) AS fecha_programacion,
    pacientes.id,pacientes.primer_nombre,pacientes.numero_documento
    FROM prog_toma_muestra
    RIGHT JOIN pacientes ON  pacientes.id = prog_toma_muestra.pacientes_id
    WHERE prog_toma_muestra.pacientes_id = ? AND fecha_realizacion IS NULL"
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
